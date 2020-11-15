<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student; 
use Image; 
class StudentController extends Controller
{
   public function showstudent(){
      $student = Student::all();
      return view("showdata",compact('student'));
   }
    public function addstudent(Request $request){
      // check ager form ka method post hai then will work 
      if($request->isMethod('post')){
         // getting the input fields
         $data = $request->all();
         //making the model object
         $student = new Student;
         //getting the values of all input fields
         $student->name = $data['name'];
         $student->rollno = $data['rollno'];
         $student->email = $data['email'];
         $student->phone = $data['phone'];
         // Getting an Image
         if($request->hasfile('image')){ // will check if image has present
            // Getting the file from Input field or grab the image
            $img_tmp = $request->file('image'); 
          //getting the image extension
            $extension = $img_tmp->getClientOriginalExtension();  //check the extension jpg etc
            //changing the image name
            $filename = rand(1111,9999).'.'.$extension; // it will be 123.jpg
         //setting the image path
            $img_path = 'uploads/studentspics/'.$filename;
             //Saving and resizing Image
            Image::make($img_tmp)->resize(500,500)->save($img_path);
            //Saving the file into Database
            $student->image = $filename;
         }
         //saving all the data into database
         $student->save();
         return redirect('/index')->with('data1','Data Has been saved Successfully');
       }
       return view('addstudent');
      }
       // function for Updating the data
       public function editstudent(Request $request,$id = null){
       // check ager form ka method post hai then will work 
         if($request->isMethod('post')){
         // getting the input fields
         $data = $request->all();
         // Getting an Image
          if($request->hasfile('image')){ // will check if image has present
            // Getting the file from Input field or grab the image
            $img_tmp = $request->file('image'); 
            //getting the image extension
            $extension = $img_tmp->getClientOriginalExtension();  //check the extension jpg etc
            //changing the image name
            $filename = rand(1111,9999).'.'.$extension; // it will be 123.jpg
            //setting the image path
            $img_path = 'uploads/studentspics/'.$filename;          
            //Saving and resizing Image
            Image::make($img_tmp)->resize(500,500)->save($img_path);          
            }else{
               $filename = $data['current_image'];
            }
            //updating Query
            Student::where(['id'=>$id])->update(['name'=>$data['name'],'rollno'=>$data['rollno'],
            'email'=>$data['email'],'phone'=>$data['phone'],'image'=>$filename]);
           // sara kaam kernay k baad kis page per jana hai
            return redirect('/index');
         }
            $studentDetail = Student::where(['id'=>$id])->first();          
         // jab edit wala button press ho ga tu kis page pr jana hai
            return view('editstudent')->with(compact('studentDetail'));   
      }
      // function for deleting the data
      public function deletestudent($id = null){
         Student::where(['id'=>$id])->delete();
         return redirect()->back();
      }
   }


            

         

       

       

       
     

    

