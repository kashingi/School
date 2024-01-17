<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Sudent List";
        return view('admin.student.list', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'admission_number' => 'required|unique:users',
            'weight' => 'required|min:2|max:20',
            'religion' => 'required|min:4|max:20',
            'date_of_birth' => 'required|date|before_or_equal:2010-12-31',
            'admision_date' => 'required|date|before:tomorrow',
            'mobile_number' => 'required|max:15',
            'email' => 'required|email|unique:users|min:8|max:50',
            //'password' => 'min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
            'blood_group' => 'required|min:2|max:10',
            'height' => 'required|min:2|max:20'
            
        ]);
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            # code...
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admision_date)) {
            # code...
            $student->admision_date =$admissionDate = Carbon::parse($request->input('admission_date'))->format('Y-m-d H:i:s');
        }
        if (!empty($request->profile_pic)) {
            # code...
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;

        $student->save();
        return redirect('admin/student/list')->with('success', "Student created successfully.");

    }
    //create the edit function to edit student
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['headre_title'] = "Edit Student";
            return view('admin.student.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    //create function to update student
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|min:8|max:50'.$id,
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'admission_number' => 'required',
            'weight' => 'required|min:2|max:20',
            'religion' => 'required|min:4|max:10',
            'date_of_birth' => 'required|date|before_or_equal:2005-12-31',
            'admision_date' => 'required|date|before:tomorrow',
            'mobile_number' => 'required|max:15',
            //'password' => 'min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
            'blood_group' => 'required|min:2|max:10',
            'height' => 'required|min:2|max:20'
            
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            # code...
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admision_date)) {
            # code...
            $student->admision_date =$admissionDate = Carbon::parse($request->input('admission_date'))->format('Y-m-d H:i:s');
        }
        if (!empty($request->file('profile_pic'))) {
            # code...
            if (!empty($student->getProfile())) {
                # code...
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        //$student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
       // $student->admision_date = trim($request->admision_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;

        $student->save();
        return redirect('admin/student/list')->with('success', "Student created successfully.");
    }
    //create a function to delete stuent
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) 
        {
            # code...
            $getRecord->is_delete = 1;
            $getRecord->save();


            return redirect()->back()->with('success', "Student deleted successfully>");
        }
        else {
            # code...
            abort(404);
        }
    }

    //Teacher side
    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = "My Students";
        return view('teacher.my_student', $data);
    }
    public function Payment()
    {
        $data['getRecord'] = User::getPayment(Auth::user()->id);
        $data['header_title'] = "Payment Page";
        return view('student.payment', $data);
    }

    public function token()
    {
        $consumerKey ="twaI7nZLME8BAgTptG8SOh1G6bK3R8HL";
        $consumerSecret ="mAqSHxpvqvjdKuQA";
        $credentials = base64_encode($consumerKey . ":" . $consumerSecret);
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $response = Http::withBasicAuth($consumerKey, $consumerSecret)->get($url);
        return $response['access_token'];
    }
    public function stkCallback()
    {
       
        $data = file_get_contents('php://input');
        Log::info($data);
        $response = json_decode($data, true);
        // session(['apiResults' => $response]);
        $ResultCode = $response['Body']['stkCallback']['ResultCode'];

        if ($ResultCode == 0) 
        {
            $MerchantRequestID = $response['Body']['stkCallback']['MerchantRequestID'];
            $CheckoutRequestID = $response['Body']['stkCallback']['CheckoutRequestID'];
            $ResultDesc = $response['Body']['stkCallback']['ResultDesc'];
            $Amount = $response['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
            $MpesaReceiptNumber = $response['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            //$Balance=$response['Body']['stkCallback']['CallbackMetadata']['Item'][2]['Value'];
            $TransactionDate = $response['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
            $PhoneNumber = $response['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
            $payment=new PaymentModel();
            $payment->CheckoutRequestID = $CheckoutRequestID;
            $payment->MerchantRequestID = $$MerchantRequestID;
            $payment->ResultCode = $ResultCode;
            $payment->Amount = $Amount;
            $payment->MpesaReceiptNumber = $MpesaReceiptNumber;
            $payment->PhoneNumber = $PhoneNumber;
            $payment->save();
        }
           
        
    }
    

    public function PaymentNow()
    {
        
        /***/
       
        $accessToken = $this->token();
        $url ="https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $PassKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919" ;
        $BusinessShortCode =174379;
        $Timestamp = Carbon::now()->format('YmdHis');
        $Password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
        $TransactionType = 'CustomerPayBillOnline';
        $Amount =1;
        $PartyA = 254746350811;
        $PartyB = 174379;
        $CallbackUrl = "https://fcab-197-232-61-227.ngrok-free.app/api/stkCallback";

        $AccountReference = 'Quickoffice';
        $TransactionDescription = 'Payment e-service';
        try {

            $response = Http::withToken($accessToken)->post($url, [
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $Password,
                'Timestamp' => $Timestamp,
                'TransactionType' => $TransactionType,
                'Amount' => 1,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'PhoneNumber' => $PartyA,
                'CallBackURL' => $CallbackUrl,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDescription
            ]);
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Error in payment request. Response status code: ' . $response->getStatusCode());
            }
   
         return redirect('student/receipt')->with('success', "Payment made successfully, you can now print receipt.");
        } catch (\Throwable $e) {
            return redirect('/error')->with(['error' => $e->getMessage()]);
        }
        // $data['header_title'] = "Payment Page";
        //  return view('student.payment', $data);
    }


    // create public function to print receipt
    public function Receipt()
    {
        $data['header_title'] = "Print Receipt";
        return view('student.receipt', $data);
    }
}
