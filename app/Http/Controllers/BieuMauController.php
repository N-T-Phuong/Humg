<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BieuMauController extends Controller
{
    public function index($id)
    {
        $view = '';
        switch ($id)
        {
            case 'TT_1':
                $view = 'backend.bieumau.gheplop';
                break;
            case 'TT_2':
                $view = 'backend.bieumau.molop';
                break;
            case 'TT_3':
                $view = 'backend.bieumau.TTSX';
                break;
            case 'TT_4':
                $view = 'backend.bieumau.rut';
                break;
            case 'TT_5':
                $view = 'backend.bieumau.hptd';
                break;
            case 'TT_6':
                $view = 'backend.bieumau.hptc';
                break;
            case 'TT_7':
                $view = 'backend.bieumau.TTTN';
                break;
            case 'TT_8':
                $view = 'backend.bieumau.DATN';
                break;
            case 'TT_9':
                $view = 'backend.bieumau.baoveTN';
                break;
            case 'TT_10':
                $view = 'backend.bieumau.capbangdiem';
                break;
            case 'TT_11':
                $view = 'backend.bieumau.hoanthi';
                break;
            case 'TT_12':
                $view = 'backend.bieumau.hoanthi';
                break;
            case 'TT_13':
                $view = 'backend.bieumau.hoanthi';
                break;
            default:
                $view = 'backend.bieumau.gheplop';
                break;
        }
        return view($view);
    }
}
