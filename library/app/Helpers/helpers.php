<?php
    use App\Models\Transaction;
    use Carbon\Carbon;

    function idrCurrency($value){
        return 'Rp. '.number_format($value, 0, ",", ".");
    }

    function dateFormat($value){
        return date('d M Y', strtotime($value));
    }

    function limitStringNotif($value){
        return Str::limit($value, 15, '...');
    }

    function notification(){
        // $authors = Transaction::where('date_end', '>=', Carbon::now())->where('status', 0)->get();
        return Transaction::where('date_end', '<=', Carbon::now())->where('status', 0)->orderBy('date_end', 'desc')->get();
    }
?>