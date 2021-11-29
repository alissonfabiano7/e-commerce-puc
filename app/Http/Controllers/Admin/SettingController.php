<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SettingController extends BaseController
{
    use UploadAble;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('Configurações', 'Configuração de parâmetros');
        return view('admin.settings.index');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {

    }
}
