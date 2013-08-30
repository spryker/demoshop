<?php
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * rawShellLogger and RawImport extension by Marco Roßdeutscher <marco.rossdeutscher@project-a.com
 */
class Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductImport implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Generated_Zed_ArtistPortal_Component_Factory
     */
    protected $factory;

    /**
     * @var array
     */
    protected $firstRow;

    /**
     * @var bool
     */
    protected $verbose = false;

    /**
     * @var bool
     */
    protected $rawShellImport = false;

    /**
     * @var int
     */
    protected $skipRows = 0;

    /**
     * @var
     */
    protected $tempFile;

    /**
     * @var int
     */
    protected $rows;

    /**
     * @var Sao_Zed_ArtistPortal_Component_Interface_InboundProduct
     */
    protected $inboundProduct;

    /**
     * @var Sao_Zed_Library_ShellLogger
     */
    protected $shellLogger;

    /**
     * @param $file
     * @param bool $verbose
     * @param bool $rawShellImport
     * @param int $skipRows
     */
    public function importFile($file, $verbose = false, $rawShellImport = false, $skipRows = 0)
    {
        if ($this->isFileAUrl($file)) {
            $file = $this->downloadFile($file);
        }
        $this->firstRow = null;
        $this->verbose = $verbose;
        $this->rawShellImport = $rawShellImport;
        $this->skipRows = $skipRows;
        $start = microtime(true);
        if ($this->verbose) {
            header('Content-Type: text/plain');
            echo '[' . PHP_EOL;
        }

        if ($this->rawShellImport) {
            //initialisation will disable foreignKey checks and autoCommit
            $this->inboundProduct = $this->factory->getModelInboundProductRaw();
            $this->shellLogger = new Sao_Zed_Library_ShellLogger();
            $this->shellLogger->startExecutor();
        } else {
            $this->inboundProduct = $this->factory->getModelInboundProduct();
        }

        $lexerConfig = new LexerConfig();
        $lexerConfig->setFlags(SplFileObject::READ_CSV|SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY);
        $lexerConfig->setDelimiter(",");
        $lexerConfig->setEnclosure("\"");
        $lexerConfig->setEscape("\"");
        $lexer = new Lexer($lexerConfig);
        $interpreter = new Interpreter();
        $interpreter->addObserver(array($this, 'parseRow'));
        try {
            $lexer->parse($file, $interpreter);
        } catch(\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
            echo $this->rows . PHP_EOL;
            die();
        }


        if ($this->rawShellImport) {
            //commit stuff
            $this->inboundProduct->commit();
            $this->shellLogger->finishedExecutor();
        }

        if ($this->verbose || $this->rawShellImport) {
            $time = microtime(true) - $start;
            echo '"time":"' . round($time, 2) . '"';
            echo '"pps":"' . round($this->rows / $time, 2) . '"';
            echo ']';
        }
    }

    /**
     * @param string $file
     * @return string
     */
    protected function downloadFile($file)
    {
        $this->tempFile = tmpfile();
        set_time_limit(0); // unlimited max execution time
        $options = [
            CURLOPT_FILE => $this->tempFile,
            CURLOPT_TIMEOUT => 28800, // set this to 8 hours so we dont timeout on big files
            CURLOPT_URL => $file
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $meta_data = stream_get_meta_data($this->tempFile);
        $filename = $meta_data["uri"];
        return $filename;
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function isFileAUrl($file)
    {
        return strpos($file, 'http') === 0;
    }

    /**
     * @param array $row One line of the csv
     */
    public function parseRow($row)
    {
        if (!$this->firstRow) {
            $this->firstRow = $row;
            return;
        }

        $this->rows++;

        if ($this->rawShellImport) {
            $this->shellLogger->progressJob($this->rows);
        }

        if ($this->rows < $this->skipRows) {
            return;
        }

        $data = array_combine($this->firstRow, $row);

        foreach ($data as $key => $value) {
            switch ($key) {
                case 'available':
                    $data[$key] = (bool)$value;
                    break;
                case 'frames':
                    if (empty($value)) {
                        $data[$key] = null;
                    } else {
                        $data[$key] = explode(';', $value);
                    }
                    break;
                case 'le_sold':
                    if (empty($value)) {
                        $data[$key] = null;
                    } else {
                        $data[$key] = explode(';', $value);
                    }
                    break;
                default:
                    if ($value === '') {
                        $data[$key] = null;
                    }
            }
        }

        $result = $this->inboundProduct->processProducts($data);

        if ($this->verbose) {
            echo json_encode($result['results'][0]) . PHP_EOL;
        }

        if ($this->rawShellImport) {
            /* @var Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductRaw $inboundProduct */
            $inboundProduct = $this->inboundProduct;
            $recordForLog = $inboundProduct->prepareRecordForLog($data);
            if ($result['response_code'] !== 200) {
                $data = json_encode($result);
                $message = 'Something went wrong. See last result. Error in Line: ' . $this->rows;
                $inboundProduct->createLogEntryFromMessage($message, $data, $recordForLog);
            }
        } else {
            if ($result['response_code'] !== 200) {
                var_dump($result);
                die('Something went wrong. See last result. Error in Line: ' . $this->rows);
            }
        }


    }

    public function __destruct()
    {
        if ($this->tempFile) {
            fclose($this->tempFile); // This also removes the tmp file
        }
    }


}
