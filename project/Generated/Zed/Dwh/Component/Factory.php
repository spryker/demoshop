<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Dwh_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Dwh_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Gui_Import
     */
    public function getGuiImport()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Gui_Import');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Gui_Reports
     */
    public function getGuiReports()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Gui_Reports');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Gui_Schema
     */
    public function getGuiSchema()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Gui_Schema');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $cubesUrl (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Cubes_Connection
     */
    public function getModelCubesConnection($cubesUrl = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Cubes_Connection');
        $model = new $class($cubesUrl);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $message (optional) default: ''
     * @param mixed $httpStatus (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Cubes_Exception
     */
    public function getModelCubesException($message = '', $httpStatus = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Cubes_Exception');
        $model = new $class($message, $httpStatus);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Cubes_Log
     */
    public function getModelCubesLog()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Cubes_Log');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $sqlStatement 
     * @param array $attributes (optional) default: array()
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_ExecuteSQL
     */
    public function getModelImportCommandExecuteSQL(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $sqlStatement, $attributes = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_ExecuteSQL');
        $model = new $class($job, $sqlStatement, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_FlushCubesCache
     */
    public function getModelImportCommandFlushCubesCache(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_FlushCubesCache');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadCsvFiles
     */
    public function getModelImportCommandLoadCsvFiles(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadCsvFiles');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadFromMongoDb
     */
    public function getModelImportCommandLoadFromMongoDb(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadFromMongoDb');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadFromMysql
     */
    public function getModelImportCommandLoadFromMysql(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_LoadFromMysql');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_LogRelationSizes
     */
    public function getModelImportCommandLogRelationSizes(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_LogRelationSizes');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes 
     * @param mixed $children 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_RunReport
     */
    public function getModelImportCommandRunReport(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes, $children)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_RunReport');
        $model = new $class($job, $attributes, $children);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_RunSqlFile
     */
    public function getModelImportCommandRunSqlFile(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_RunSqlFile');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes 
     * @param mixed $emails 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_SendQueryAsEmail
     */
    public function getModelImportCommandSendQueryAsEmail(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes, $emails)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_SendQueryAsEmail');
        $model = new $class($job, $attributes, $emails);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteConfig
     */
    public function getModelImportCommandWriteConfig(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteConfig');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteMdxQueryToCsv
     */
    public function getModelImportCommandWriteMdxQueryToCsv(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteMdxQueryToCsv');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteSqlQueryToJson
     */
    public function getModelImportCommandWriteSqlQueryToJson(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Command_WriteSqlQueryToJson');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $command 
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log 
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_ExternalTool
     */
    public function getModelImportExternalTool($command, ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log, ProjectA_Zed_Dwh_Component_Model_Import_Job $job)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_ExternalTool');
        $model = new $class($command, $log, $job);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $id 
     * @param mixed $description 
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Process $process 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Job
     */
    public function getModelImportJob($id, $description, ProjectA_Zed_Dwh_Component_Model_Import_Process $process)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Job');
        $model = new $class($id, $description, $process);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Log_Html
     */
    public function getModelImportLogHtml()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Log_Html');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Log_Plain
     */
    public function getModelImportLogPlain()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Log_Plain');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $id 
     * @param mixed $description 
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Process $process 
     * @param mixed $functionName 
     * @param mixed $functionEchoQueries 
     * @param mixed $functionParameters 
     * @param mixed $queryForLastParameter 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_ParallelJob
     */
    public function getModelImportParallelJob($id, $description, ProjectA_Zed_Dwh_Component_Model_Import_Process $process, $functionName, $functionEchoQueries, $functionParameters, $queryForLastParameter)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_ParallelJob');
        $model = new $class($id, $description, $process, $functionName, $functionEchoQueries, $functionParameters, $queryForLastParameter);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $processDefinitionFileName 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Process
     */
    public function getModelImportProcess($processDefinitionFileName)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Process');
        $model = new $class($processDefinitionFileName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Processes
     */
    public function getModelImportProcesses()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Processes');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Run_Parallel
     */
    public function getModelImportRunParallel(ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Run_Parallel');
        $model = new $class($log);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Run_Sequential
     */
    public function getModelImportRunSequential(ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Run_Sequential');
        $model = new $class($log);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Import_Stats
     */
    public function getModelImportStats()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_Stats');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $id 
     * @param mixed $description 
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Process $process 
     * @param mixed $masterJob 
     * @return ProjectA_Zed_Dwh_Component_Model_Import_SubJob
     */
    public function getModelImportSubJob($id, $description, ProjectA_Zed_Dwh_Component_Model_Import_Process $process, $masterJob)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Import_SubJob');
        $model = new $class($id, $description, $process, $masterJob);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $args 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_BarChart
     */
    public function getModelMdxBarChart($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $args)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_BarChart');
        $model = new $class($mdxExpression, $connection, $divID, $args);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $args 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_ColumnChart
     */
    public function getModelMdxColumnChart($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $args)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_ColumnChart');
        $model = new $class($mdxExpression, $connection, $divID, $args);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $width 
     * @param mixed $height 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_GoogleChart
     */
    public function getModelMdxGoogleChart($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $width, $height)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_GoogleChart');
        $model = new $class($mdxExpression, $connection, $divID, $width, $height);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $args 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_LineChart
     */
    public function getModelMdxLineChart($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $args)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_LineChart');
        $model = new $class($mdxExpression, $connection, $divID, $args);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $args 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_Map
     */
    public function getModelMdxMap($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $args)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_Map');
        $model = new $class($mdxExpression, $connection, $divID, $args);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_Processor
     */
    public function getModelMdxProcessor($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_Processor');
        $model = new $class($mdxExpression, $connection, $divID);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID 
     * @param mixed $args 
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_Table
     */
    public function getModelMdxTable($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID, $args)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_Table');
        $model = new $class($mdxExpression, $connection, $divID, $args);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_ToArray
     */
    public function getModelMdxToArray($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_ToArray');
        $model = new $class($mdxExpression, $connection, $divID);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $mdxExpression 
     * @param ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection 
     * @param mixed $divID (optional) default: null
     * @return ProjectA_Zed_Dwh_Component_Model_Mdx_ToCsv
     */
    public function getModelMdxToCsv($mdxExpression, ProjectA_Zed_Dwh_Component_Model_Cubes_Connection $connection, $divID = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Mdx_ToCsv');
        $model = new $class($mdxExpression, $connection, $divID);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Report_Everything
     */
    public function getModelReportEverything()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Report_Everything');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Report_List
     */
    public function getModelReportList()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Report_List');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name 
     * @param mixed $description 
     * @return ProjectA_Zed_Dwh_Component_Model_Schema_AdHocMeasure
     */
    public function getModelSchemaAdHocMeasure($name, $description)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Schema_AdHocMeasure');
        $model = new $class($name, $description);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name 
     * @param mixed $aggregator 
     * @param mixed $formula 
     * @param mixed $formatString 
     * @param mixed $description 
     * @return ProjectA_Zed_Dwh_Component_Model_Schema_BasicMeasure
     */
    public function getModelSchemaBasicMeasure($name, $aggregator, $formula, $formatString, $description)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Schema_BasicMeasure');
        $model = new $class($name, $aggregator, $formula, $formatString, $description);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name 
     * @param mixed $formula 
     * @param mixed $formatString 
     * @param mixed $description 
     * @return ProjectA_Zed_Dwh_Component_Model_Schema_DerivedMeasure
     */
    public function getModelSchemaDerivedMeasure($name, $formula, $formatString, $description)
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Schema_DerivedMeasure');
        $model = new $class($name, $formula, $formatString, $description);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_Schema_Processor
     */
    public function getModelSchemaProcessor()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_Schema_Processor');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dwh_Component_Model_User
     */
    public function getModelUser()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dwh_Component_Model_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Dwh_Component_Model_Import_Job $job 
     * @param mixed $attributes (optional) default: null
     * @return Sao_Zed_Dwh_Component_Model_Import_Command_LoadOrderStatusMapping
     */
    public function getModelImportCommandLoadOrderStatusMapping(ProjectA_Zed_Dwh_Component_Model_Import_Job $job, $attributes = null)
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Import_Command_LoadOrderStatusMapping');
        $model = new $class($job, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_AdHoc
     */
    public function getModelReportAdHoc()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_AdHoc');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_CampaignClicks
     */
    public function getModelReportCampaignClicks()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_CampaignClicks');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_Campaigns
     */
    public function getModelReportCampaigns()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_Campaigns');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_Conversions
     */
    public function getModelReportConversions()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_Conversions');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_MonthlyOrderItems
     */
    public function getModelReportMonthlyOrderItems()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_MonthlyOrderItems');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_NLCampaigns
     */
    public function getModelReportNLCampaigns()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_NLCampaigns');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_NLRecipients
     */
    public function getModelReportNLRecipients()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_NLRecipients');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_OrderStatus
     */
    public function getModelReportOrderStatus()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_OrderStatus');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Dwh_Component_Model_Report_Sales
     */
    public function getModelReportSales()
    {
        $class = $this->transformClassName('Sao_Zed_Dwh_Component_Model_Report_Sales');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
