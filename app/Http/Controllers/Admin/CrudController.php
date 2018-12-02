<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HandleDropzoneUploadHelper;
use App\Http\Controllers\Admin\Traits\Permissions;

class CrudController extends \Backpack\CRUD\app\Http\Controllers\CrudController
{
    use Permissions;
    use HandleDropzoneUploadHelper;

    public function wantsJSON()
    {
        return $this->request && strpos($this->request->headers->get('accept'), 'application/json') === 0;
    }

    private $i = 0;
    public function separator()
    {
        $this->crud->addField([
            'name' => 'separator' . $this->i++,
            'type' => 'custom_html',
            'value' => '<hr />',
            'wrapperAttributes' => [
                'style' => 'margin:0',
            ],
        ]);
    }

    public function getEntryID()
    {
        preg_match('/\w+\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        return $matches && sizeof($matches) > 1 ? intval($matches[1]) : null;
    }
}
