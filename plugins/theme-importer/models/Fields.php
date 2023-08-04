<?php

/**
 * Class for handling fields of a page
 *
 * @property int $pageId The ID of the page to handle fields for
 */
class Fields
{
    private $pageId;

    /**
     * FieldsHandler constructor.
     * 
     * @param int $pageId The ID of the page to handle fields for
     */
    public function __construct($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     * Update fields of a page
     *
     * @param array $fields The fields to be updated, containing the field name as the key and the field value as the value
     *
     * @return array An array with the success status, a message and the error if applicable
     * Example: ['success' => true, 'message' => "All fields are be imported."]
     */
    public function updateFields($fields)
    {
        try {
            foreach ($fields as $field) {
                $fieldData = $this->prepareFields($field);
                update_field("field_" . $fieldData['key'], $fieldData['value'], $this->pageId);
            }
            return [
                'success' => true,
                'message' => "All fields are imported."
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Some fields couldn't be imported. Try again later.",
                'error' => $e->getMessage(),
            ];
        }
    }

    private function prepareFields($field)
    {
        if (!is_array($field['value'])) {
            $fieldValue = $field['isFile'] ? Files::upload($field['value'], $this->pageId) : $field['value'];
            $field['value'] = $fieldValue;
        } else {
            $field['value'] = $this->formatGroupsFields($field['value']);
        }
        return $field;
    }

    private function formatGroupsFields($fields)
    {
        $newValue = [];
        foreach ($fields as $key => $value) {
            if (!isset($value['key'])) {
                $newValue[$key] =  $this->formatGroupsFields($value);
            } else {
                $fieldValue = $value['isFile'] ? Files::upload($value['value'], $this->pageId) : $value['value'];
                $newValue[$value['key']] = $fieldValue;
            }
        }
        return $newValue;
    }
    
}
