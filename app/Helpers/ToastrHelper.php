<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('flashToastr')) {
    function flashToastr(string $type, string $message, string $title = null, array $options = [])
    {
        // ডিফল্ট options
        $defaultOptions = [
            "closeButton"   => true,
            "progressBar"   => true,
            "timeOut"       => 3000,
            "positionClass" => "toast-top-right",
           
        ];

        // কাস্টম options এর সাথে merge
        $finalOptions = array_merge($defaultOptions, $options);

        // Session এ সেট করা
        Session::flash('toastr', [
            'type'    => $type,
            'message' => $message,
            'title'   => $title,
            'options' => $finalOptions
        ]);
    }
}

if (!function_exists('renderToastr')) {
    function renderToastr()
    {
        if (Session::has('toastr')) {
            $toast = Session::get('toastr');

            $type    = $toast['type'];
            $message = $toast['message'];
            $title   = $toast['title'] ?? '';
            $options = json_encode($toast['options']);

            return "
            <script>
                toastr.options = {$options};
                toastr['{$type}']('{$message}', '{$title}');
            </script>
            ";
        }
        return '';
    }

    if(!function_exists('deleteConfirm')){
        function deleteConfirm(){
            return view('admin.partials.deleteConfirm');

            if(Session::has('success')){
                $success = Session::get('success');

                $type    = $success['type'];
                $message = $success['message'];
                $title   = $success['title'] ?? '';
                $options = json_encode($success['options']);

                return "
                
               
                ";

            }

        }
    }
}


