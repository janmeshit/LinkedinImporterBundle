<?php

namespace CCC\LinkedinImporterBundle\Tests;

use Tamago\LinkedinImporterBundle\Form\RequestPrivate;
use Tamago\LinkedinImporterBundle\Form\RequestPublic;

/**
 * Stubbing out some tentative tests
 */
class FormsTest extends \PHPUnit_Framework_TestCase
{
    public function testForms()
    {
        $privateForm = new RequestPrivate();
        $publicForm = new RequestPublic();
        $this->assertEquals('privaterequest', $privateForm->getName());
        $this->assertEquals('requestpublic', $publicForm->getName());
    }

}
