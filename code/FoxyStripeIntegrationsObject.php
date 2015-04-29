<?php
	
class FoxyStripeIntegrationsObject extends DataObject {
	
	private static $db = array(
		'Name' => 'Varchar(150)',
		'URL' => 'Varchar(255)'
	);
	
	private static $has_one = array(
		'SiteConfig' => 'SiteConfig'
	);
	
	private static $singular_name = 'Integration';
	private static $plural_name = 'Integrations';
	
	private static $summary_fields = array(
		'Name',
		'URL'
	);

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $fields->removeByName('SiteConfigID');

        /*$options = ClassInfo::subclassesFor('FoxyStripeIntegrationsObject');
        $source = [];
        foreach($options as $option){
            $source[$option] = singleton($option)->singular_name();
        }
        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('ClassName')
                ->setTitle('Type of integration')
                ->setSource($source)
                ->setEmptyString('Select Integration Type')
        );*/

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getIntegrationURL(){
        return $this->URL;
    }

}