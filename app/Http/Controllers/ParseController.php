<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\False_;
use function GuzzleHttp\Promise\settle;

class ParseController extends Controller
{
    public function index()
    {
        return view('home');
    }

    private function import(Request $request)
    {
        $request->file->store('files');
    }

    private function get_numeric($val)
    {
        if (is_numeric($val))
        {
            return $val + 0;
        }
        return 0;
    }

    public function parse(Request $request)
    {
        //dd($request->all());
        $filePath = $request->get('filePath');
        $colNumber = $this->get_numeric($request->get('colSelect'));
        $colName = '';
        $result = 0;
        $rows = 0;

        if (($handle = fopen($filePath, "r")) !== false)
        {
            while(($line = fgets($handle)) !== false)
            {
                $stringCSV = str_getcsv($line);
                $result += $this->get_numeric($stringCSV[$colNumber]);

                if($rows == 0)
                    $colName = $stringCSV[$colNumber];

                $rows++;
            }
            fclose($handle);
        }

        return view('result')->with('data',
            array('filePath' => $filePath,
                'rows' => $rows,
                'colName' => $colName,
                'result' => $result));
    }

    public function preview(Request $request)
    {
        $file = $request->get('file');

        if(empty($file))
        {
            return redirect(route('home'));
        }

        $data = $this->getPreviewData($file);

        return view('preview')->with('data', $data);
    }

    private function getPreviewData($file)
    {
        $data = array();
        array_push($data, 'public/storage/uploads/' . $file);
        if (($handle = fopen('public/storage/uploads/' . $file, "r")) !== FALSE)
        {
            for($i = 1; $i <=10; $i++)
            {
                array_push($data, fgetcsv($handle));
            }

            fclose($handle);
        }

        return $data;
    }
}
