<?php
/**
 * @file
 * Contains \Drupal\srijan_block\FormCustom\BlockAdd.
 */

namespace Drupal\srijan_block\FormCustom;
use Drupal\Core\Form\FormBase;
//use Drupal\quiz\Custom\AllQuestion;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contribute form.
 */
class BlockAdd extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
	
	return 'forms_add_block_form';
	
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  
		
		$form['title'] = array(
		  '#type' => 'textfield',
		  '#title' => t('Title'),
		  '#required' => TRUE,
		);
		$form['image'] = array(
			'#type' => 'file',
			'#title' => t('Upload picture'),
			'#description' => t('Select a picture of at least @dimensionspx and maximum @filesize.', array(
			'@dimensions' => '100x100',
			'@filesize' => format_size(file_upload_max_size()),
			)),
		);
		$form['desc_custom'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Description'),
		  '#required' => TRUE,
		);
		$form['page_url'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Enter Page Urls'),
		);
		$form['display_page'] = array(
			'#type' => 'radios',
			'#title' => $this->t('Display Options'),
			'#default_value' => 1,
			'#options' => array(
					1 => $this
				  ->t('Display On Above Page'),
				0 => $this
				  ->t('Not Display On Above Page'),
			  ),
		);
		$form['ip_address'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Enter Ip Address'),
		);
		$form['display_ip'] = array(
			'#type' => 'radios',
			'#title' => $this->t('Display Options'),
			'#default_value' => 1,
			'#options' => array(
					1 => $this
				  ->t('Display On Above Ip Addresses'),
				0 => $this
				  ->t('Not Display On Above Ip Addresses'),
			  ),
		);
		
		$form['submit'] = array(
		  '#type' => 'submit',
		  '#value' => t('Submit'),
		);
		return $form;
	  
  
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  
	
	
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	$fields = array('title' => $form_state->getValue('title'),
					'description1' => $form_state->getValue('desc_custom'),
					'page_url' => $form_state->getValue('page_url'),
					'display_page' => $form_state->getValue('display_page'),
					'ip_address' => $form_state->getValue('ip_address'),
					'display_ip' => $form_state->getValue('display_ip'),
					'title' => $form_state->getValue('title'),
					);
	
	//echo "<pre>"; print_r($fields); exit;
	$file = file_save_upload('image', array(
    'file_validate_is_image' => array(),
    'file_validate_image_resolution' => array('500x500', '100x100'),
  ), 'public://', FILE_EXISTS_RENAME);
  
   $fields['image_path'] = $file->destination;
	
	//echo "<pre>"; print_r($fields);exit;
		$aid = db_insert("srjan_block")
				->fields($fields)
				->execute();
	
  }
}
?>