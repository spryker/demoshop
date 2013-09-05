<?php

class Sao_Zed_Customer_Module_Controller_Sandbox extends ProjectA_Zed_Library_Controller_Action implements  ProjectA_Zed_Customer_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Customer_Component_Dependency_Facade_Trait;

    public function cpfAction()
    {
        $this->checkCpfAndRenderBlock('123456789-09');
        $this->checkCpfAndRenderBlock('1234567891-09');
        $this->checkCpfAndRenderBlock('123456789-109');
        $this->checkCpfAndRenderBlock('12345678-09');
        $this->checkCpfAndRenderBlock('123456789-9');

        $this->checkCpfAndRenderBlock('12345678909');
        $this->checkCpfAndRenderBlock('123456789109');
        $this->checkCpfAndRenderBlock('1234567809');
        $this->checkCpfAndRenderBlock('1234567899');

        $this->checkCpfAndRenderBlock('00000000000');

        $this->checkCpfAndRenderBlock('473083853-02');
        $this->checkCpfAndRenderBlock('373083853-02');
        $this->checkCpfAndRenderBlock('473083853-03');
        $this->checkCpfAndRenderBlock('605125711-04');
        $this->checkCpfAndRenderBlock('60512571104');
        $this->checkCpfAndRenderBlock('50512571104');

        $this->checkCpfAndRenderBlock('123.456.789-09');
        $this->checkCpfAndRenderBlock('1.2.3.4.5.6.7.8.9.0.9');
        $this->checkCpfAndRenderBlock('1-2-3-4-5-6-7-8-9-0-9');


        die('-EOF');
    }


    protected function checkCpfAndRenderBlock($cpf)
    {
        $valid = $this->facadeCustomer->validateCpf($cpf);
        echo 'CPF <b>' . $cpf . '</b>';
        echo ' [length '.strlen(str_replace(array('-', '.'), '', $cpf)).']';
        echo ': is ';
        if (!$valid) {
            echo '<span style="color:red;">NOT</span> ';
        }
        echo 'valid ';
        echo '<br />' . PHP_EOL;
    }

}