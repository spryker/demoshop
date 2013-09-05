<?php

class Sao_Zed_Pdf_Component_Model_Converter
{
    /**
     * Does not work with ghostscript 0.8.x
     * @param string $pdfContent binary data of pdf
     * @return array
     * @throws Exception
     */
    public function convertPdfContentToJpg($pdfContent)
    {
        $tmpFile = tmpfile();
        fwrite($tmpFile, $pdfContent);
        fseek($tmpFile, 0);
        $meta_data = stream_get_meta_data($tmpFile);
        $tmpFilename = $meta_data["uri"];

        $images = [];

        try {
            $im = new Imagick();
            $im->setResolution(300, 300);
            $im->readImage($tmpFilename);
            /* @var $page Imagick */
            foreach ($im as $page) {

                // resample
                $page->setImageResolution(300, 300);
                $page->resampleImage(300, 300, Imagick::FILTER_UNDEFINED, 1);

                // print colorpsace
                $page->setColorspace(Imagick::COLORSPACE_CMYK);

                $page->setImageFormat('jpeg');

                // to slow
                //$page->setCompression(Imagick::COMPRESSION_JPEG);
                //$page->setCompressionQuality(100);

                $images[] = $page->getimageblob();
            }
            $im->clear();
            $im->destroy();
            fclose($tmpFile);
        } catch (Exception $exception) {
            if (!empty($im)) {
                $im->clear();
                $im->destroy();
            }
            throw $exception;
        }
        return $images;
    }
}
