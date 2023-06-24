<?php
	class modEntJCA{
		public static function getEntJCA($jsoncontent){
			
			JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR .'/components/com_fields/helpers/fields.php');
			JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models','ContentModel');
			$id = JFactory::getApplication()->input->get('id');
			
			JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
			$jcFields = FieldsHelper::getFields('com_content.article', $item, true);
		
			
			return json_decode($jsoncontent, true);
		}
	}
?>