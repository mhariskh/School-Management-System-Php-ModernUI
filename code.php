<?php
ob_start();
 include('security.php');







if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $userType = $_POST['userType'];

    $email_query = "SELECT * FROM users WHERE user_email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: usersRegistered.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO users (userType,user_login,user_pass,user_nicename,user_email,display_name) VALUES ('$userType','$username','$password','$username','$email','$username')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: usersRegistered.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: usersRegistered.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: usersRegistered.php');  
        }
    }

}


if(isset($_POST['registerTeacher_btn']))
{
    $frst_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

   

   
    if(1)
    {
        if(1)
        {
            $query = "INSERT INTO teacher (first_name,last_name) VALUES ('$first_name','$last_name')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Teacher  Added";
                $_SESSION['status_code'] = "success";
                header('Location: teachers.php');
            }
            else 
            {
                $_SESSION['status'] = "Teacher Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: teachers.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: teacher.php');  
        }
    }

}



if(isset($_POST['registernewclass_btn']))
{

    $c_numb = $_POST['c_numb'];
    $c_name = $_POST['c_name'];
    $teacher_id = $_POST['teacher_id'];
    $c_capacity = $_POST['c_capacity'];
    $c_loc = $_POST['c_loc'];
    $c_sdate = $_POST['c_sdate'];
    $c_edate = $_POST['c_edate'];
    $c_fee_type = $_POST['c_fee_type'];

   

   
    if(1)
    {
        if(1)
        {
            $query = "INSERT INTO class (c_numb,c_name,teacher_id,c_capacity,c_loc,c_sdate,c_edate,c_fee_type) VALUES ('$c_numb','$c_name','$teacher_id','$c_capacity','$c_loc','$c_sdate','$c_edate','$c_fee_type')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Class  Added";
                $_SESSION['status_code'] = "success";
                header('Location: classes.php');
            }
            else 
            {
                $_SESSION['status'] = "Class Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: classes.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "error";
            $_SESSION['status_code'] = "warning";
            header('Location: classes.php');  
        }
    }

}


if(isset($_POST['updateclass_btn']))
{
    $cid = $_POST['edit_id'];
    $c_numb = $_POST['c_numb'];
    $c_name = $_POST['c_name'];
    $teacher_id = $_POST['teacher_id'];
    $c_capacity = $_POST['c_capacity'];
    $c_loc = $_POST['c_loc'];
    $c_sdate = $_POST['c_sdate'];
    $c_edate = $_POST['c_edate'];
    $c_fee_type = $_POST['c_fee_type'];

   

   
    if(1)
    {
        if(1)
        {
            $query = "UPDATE  class SET 
            c_numb = '$c_numb' ,c_name='$c_name',teacher_id= '$teacher_id',c_capacity = '$c_capacity',c_loc = '$c_loc',c_sdate='$c_sdate',c_edate = '$c_edate',c_fee_type='$c_fee_type'
            WHERE cid = $cid ";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Class  Updated Successfully";
                $_SESSION['status_code'] = "success";
                header('Location: classes.php');
            }
            else 
            {
                $_SESSION['status'] = "Class Not Updated";
                $_SESSION['status_code'] = "error";
                header('Location: classes.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "error";
            $_SESSION['status_code'] = "warning";
            header('Location: classes.php');  
        }
    }

}

if(isset($_POST['updatestudent_btn']))

{    $sid = $_POST['sid'];
    $s_rollno = $_POST['s_rollno'];
    $s_fname = $_POST['s_fname'];
    $s_lname = $_POST['s_lname'];
    $s_dob = $_POST['s_dob'];
    $s_gender = $_POST['s_gender'];
   

    $s_doj = $_POST['s_doj'];
    
    $class_id = $_POST['class_id'];


   

   
    if(1)
    {
        if(1)
        {
            $query = "UPDATE student SET 
            s_rollno = '$s_rollno',s_fname='$s_fname',s_lname= '$s_lname',s_dob = '$s_dob',s_doj = '$s_doj',class_id='$class_id'
            WHERE sid = $sid ";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                echo "Success";
                $_SESSION['studentUpdate'] = "Student   Updated Successfully";
                $_SESSION['status_code'] = "success";
                 header('Location: student.php');
            }
            else 
            { echo "Error2";
                $_SESSION['studentUpdate'] = "Student Not Updated";
                $_SESSION['status_code'] = "error";
                 header('Location: student.php');  
            }
        }
        else 
        { echo "Error3";
            $_SESSION['studentUpdate'] = "error";
            $_SESSION['status_code'] = "warning";
             header('Location: student.php');  
        }
    }

}

if(isset($_POST['updateparent_btn']))

{    $sid = $_POST['sid'];
   
    
    $p_fname = $_POST['p_fname'];
    $p_lname = $_POST['p_lname'];
    $p_gender = $_POST['p_gender'];
    $p_edu = $_POST['p_edu']; 
    $p_phone = $_POST['p_phone']; 
    $p_profession = $_POST['p_profession'];
    $p_cnic = $_POST['p_cnic']; 


   

   
    if(1)
    {
        if(1)
        {
            $query = "UPDATE parent SET p_fname='$p_fname',p_lname='$p_lname',p_gender= '$p_gender',p_edu='$p_edu',p_phone = '$p_phone',p_profession='$p_profession',p_cnic='$p_cnic'
            WHERE sid = $sid ";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['parentUpdate'] = "Parent   Updated Successfully";
                $_SESSION['status_code'] = "success";
                header('Location: student.php');
            }
            else 
            {
                $_SESSION['parentUpdate'] = "Parent Not Updated";
                $_SESSION['status_code'] = "error";
                header('Location: student.php');  
            }
        }
        else 
        {
            $_SESSION['parentUpdate'] = "error Check Failed";
            $_SESSION['status_code'] = "warning";
            header('Location: student.php');  
        }
    }

}










if(isset($_POST['register_student_btn']))
{
    $s_rollno = $_POST['s_rollno'];
    $s_fname = $_POST['s_fname'];
    $s_lname = $_POST['s_lname'];
    $s_dob = $_POST['dob'];
    $s_gender = $_POST['gender'];
    $s_address = $_POST['address'];
    $s_country = $_POST['country'];

    $s_phone = $_POST['phone_number'];
    $s_doj = $_POST['s_doj'];
    
    $class_id = $_POST['class_id'];


    $p_fname = $_POST ['p_fname'];
    $p_lname = $_POST  ['p_lname'];
    $p_gender = $_POST ['p_gender'];
    $p_edu = $_POST ['p_edu']; 
    $p_phone = $_POST  ['p_phone']; 
    $p_profession = $_POST ['p_profession'];
    $p_cnic = $_POST ['p_cnic']; 
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $userType = 'student';

    $p_username = $_POST['p_username'];
    $p_email = $_POST['p_email'];
    $p_password = $_POST['p_password'];
    $p_cpassword = $_POST['p_confirmpassword'];
    $p_userType = 'parent';




    $email_query = "SELECT * FROM users WHERE user_email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['student_email_check'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        
    }

    else
    {
        if($password === $cpassword)
        {
                    $query = "INSERT INTO users (userType,user_login,user_pass,user_nicename,user_email,display_name) VALUES ('$userType','$username','$password','$username','$email','$username')";
                    $query_run = mysqli_query($connection, $query);

                
                    
                    if($query_run)
                    {
                        // echo "Saved";
                        $_SESSION['studentprofile'] = "Student Profile Added";
                        $_SESSION['status_code'] = "success";


                       
                    }
                    else 
                    {
                        $_SESSION['studentprofile'] = "Admin Profile Not Added";
                        $_SESSION['status_code'] = "error";
                       
                    }
         }


                    else 
                    {
                        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                    $_SESSION['status_code'] = "warning";
                               
                }
    }

    $p_email_query = "SELECT * FROM users WHERE user_email='$p_email' ";
    $p_email_query_run = mysqli_query($connection, $p_email_query);

    if(mysqli_num_rows($p_email_query_run) > 0)
    {
        $_SESSION['parent_email_check'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
       
    }

    else
    {
        if($p_password === $p_cpassword)
        {
                    $p_query = "INSERT INTO users (userType,user_login,user_pass,user_nicename,user_email,display_name) VALUES ('$p_userType','$p_username','$p_password','$p_username','$p_email','$p_username')";
                    $p_query_run = mysqli_query($connection, $p_query);

                
                    
                    if($p_query_run)
                    {
                        // echo "Saved";
                        $_SESSION['parentprofile'] = "Parent Profile Added";
                        $_SESSION['status_code'] = "success";


              
                    }
                    else 
                    {
                        $_SESSION['parentprofile'] = "Parent Profile Not Added";
                        $_SESSION['status_code'] = "error";
                     
                    }
         }


                    else 
                    {
                        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                    $_SESSION['status_code'] = "warning";
                                
                }
    }




    $rollno_query = "SELECT * FROM students WHERE s_rollno='$s_rollno' ";
    $rollno_query_run = mysqli_query($connection, $rollno_query);

    // if(mysqli_num_rows($rollno_query_run) > 0)
    // {
    //     $_SESSION['student_check'] = "Student Already Available";
    //     $_SESSION['status_code'] = "error";
         
    // }
 

        $user_id_query = "SELECT user_id FROM users WHERE user_email='$email' ";
        $user_id_query_run = mysqli_query($connection, $user_id_query);
        $value1 = $user_id_query_run->fetch_object();
        $_SESSION['studentuserid'] = $value1->user_id;

        $p_user_id_query = "SELECT user_id FROM users WHERE user_email='$p_email' ";
        $p_user_id_query_run = mysqli_query($connection, $p_user_id_query);
        $value2 = $p_user_id_query_run->fetch_object();
        $_SESSION['parentuserid'] = $value2->user_id;

        $studentuserid =  $_SESSION['studentuserid'];
        $parentuserid =  $_SESSION['parentuserid'];

        

       

            $query = "INSERT INTO student (user_id,parent_user_id,s_rollno,s_fname,s_lname,s_dob,s_gender,
            s_address,s_country,s_phone,s_doj,class_id)

             VALUES 

             ('$studentuserid','$parentuserid','$s_rollno','$s_fname','$s_lname','$s_dob','$s_gender',
             '$s_address','$s_country','$s_phone','$s_doj','$class_id')";

            $query_run = mysqli_query($connection, $query);

         


        
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['add_student_check'] = "Student BioData added Successfully";
                $_SESSION['status_code'] = "success";
              
            }
            else 
            {
                $_SESSION['add_student_check'] = "Student BioData addition FAILED";
                $_SESSION['status_code'] = "error";
          
            }
        
        
    // echo 
    // $studentuserid;


    $studentidquery = "SELECT sid FROM student WHERE user_id='$studentuserid' ";
        $studentidquery_run = mysqli_query($connection, $studentidquery);
        $value2 = $studentidquery_run->fetch_object();
        $_SESSION['studentid'] = $value2->sid;
        $studentid =   $_SESSION['studentid'];



    $parentquery = "INSERT INTO parent (sid,p_fname,p_lname,p_gender,p_edu,p_phone,p_profession,p_cnic) VALUES ('$studentid','$p_fname','$p_lname','$p_gender','$p_edu','$p_phone','$p_profession','$p_cnic')";


   
    $parentquery_run = mysqli_query($connection, $parentquery);


    if($parentquery_run)
    {
        // echo "Saved";
        $_SESSION['add_student_check'] = "Student BioData added Successfully";
        $_SESSION['status_code'] = "success";

      
    }
    else 
    {
        $_SESSION['add_student_check'] = "Student BioData addition FAILED";
        $_SESSION['status_code'] = "student";
      
  
    }





$feesQuery = "INSERT INTO feesnew( sid, user_id, s_rollno, s_fname, s_lname, class_id, fees_amount, specialDiscount) VALUES ('$studentid','$studentuserid','$s_rollno','$s_fname','$s_lname','$class_id','0','0')";

echo $studentid;
echo $studentuserid;
echo $s_rollno;
echo $s_fname;
echo $s_lname;
echo $class_id;
echo '0';
echo '0';
   
    $feesQueryrun = mysqli_query($connection, $feesQuery);


    $feesUpdateQuery1 = "UPDATE feesnew  SET fees_amount=700 Where class_id = 1 OR class_id = 2 OR class_id=3";

    
    $feesUpdateQuery2 = "UPDATE feesnew  SET fees_amount=1000 Where class_id = 4 OR class_id = 5 ";


$feesUpdateQuery3 = "UPDATE feesnew  SET fees_amount=1200 Where class_id = 6 OR class_id = 7 OR class_id=8";


$feesQuery1 = mysqli_query($connection, $feesUpdateQuery1);

$feesQuery2 = mysqli_query($connection, $feesUpdateQuery2);

$feesQuery3 = mysqli_query($connection, $feesUpdateQuery3);



if($feesQueryrun)
{


$_SESSION['feesdatacheck'] ="fees data  added Successfully";
$_SESSION['status_code'] = "success";
 header('location:student.php');

    }

 
    else 
    {
        $_SESSION['feesdatacheck'] = "Student fees data addition FAILED";
        $_SESSION['status_code'] = "error";
          header('location:student.php');
  
    }





}

















if(isset($_POST['updatebtn']))
{
    $serialNumber = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

 
    $query = "UPDATE users SET user_login='$username',user_email='$email',user_pass='$password' WHERE user_id= '$serialNumber' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {

        $_SESSION['success'] = "Admin Data Has Been Updated";
        header('Location:usersRegistered.php');
    }
    else{
        $_SESSION['status'] = "Admin Data Has Not Been Updated";
        header('Location:usersRegistered.php');
    }



}


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE user_id = '$id' ";
    $query_run = mysqli_query($connection,$query);


    
    if($query_run)
    {

        $_SESSION['success'] = "Admin Data Has Been Deleted";
        header('Location:usersRegistered.php');
    }
    else{
        $_SESSION['status'] = "No Record Found . Data has not been deleted .";
        header('Location:usersRegistered.php');
    }
}




if(isset($_POST['deleteStudent_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM student WHERE sid = '$id' ";
    $query_run = mysqli_query($connection,$query);


    
    if($query_run)
    {

        $_SESSION['deletestatus'] = "Student Data Has Been Deleted";
        header('Location:student.php');
    }
    else{
        $_SESSION['deletestatus'] = "No Record Found . Data has not been deleted .";
        header('Location:student.php');
    }
}


if(isset($_POST['deleteclass_btn']))
{
    $viewclass_id = $_POST['viewclass_id'];

    $query = "DELETE FROM class WHERE cid = '$viewclass_id' ";
    $query_run = mysqli_query($connection,$query);


    
    if($query_run)
    {

        $_SESSION['success'] = "Class Data Has Been Deleted";
        header('Location:classes.php');
    }
    else{
        $_SESSION['status'] = "No Record Found . Data has not been deleted .";
        header('Location:classes.php');
    }
}



if(isset($_POST['login_btn']))

{
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT *  FROM users WHERE user_login = '$username_login' AND user_pass = '$password_login' ";
    $query_run = mysqli_query($connection,$query);

    $query1 = "SELECT sid,s_rollno,s_fname,s_lname,s_gender FROM  student";
    $query_run1 = mysqli_query($connection,$query1);
    $row = mysqli_fetch_assoc($query_run1);
    $userTypeCheck = mysqli_fetch_array($query_run);

    if(mysqli_num_rows($query_run))
    {



        
        if($userTypeCheck['userType'] == 'student')

        {
            
            $_SESSION['userType'] = 'student';
         $_SESSION['username'] = $username_login;
         $_SESSION['s_rollno'] =  $row ['s_rollno'];
         header('Location:studentaccount.php');

        }



        else if( $userTypeCheck['userType'] == 'admin'){

            echo "Admin Bhiaya";
            $_SESSION['userType'] = 'admin';
     
        $_SESSION['username'] = $username_login;
        header('Location:index.php');

            
        }

    }

    else{
        $_SESSION['status'] = 'Email / Password is Invalid ';
        header('Location:login.php');
    }

}


  


    if(isset($_POST['attendanceSubmit_btn']))
    {
        $class_id = $_POST['viewclass_idAttendance'];
        $sid = $_POST['sid'];
        $user_id = $_POST['user_id'];
        $currentDate = date('m/d/Y');

        if(!empty($_POST['absentid'])) {    
            foreach($_POST['absentid'] as $value){
                
              
                $query = "INSERT attendance(class_id,studentid,s_rollno,date) VALUES ('$class_id',$sid,'$value',CURDATE()) ";
                $query_run = mysqli_query($connection,$query);

                   
                    if($query_run)
                    {
                        // echo "Saved";
                        $_SESSION['attendanceStatus'] = "Attendance Added";
                        $_SESSION['status_code'] = "success";
                   
                    }
                    else 
                    {
                        $_SESSION['attendanceStatus'] = "Attendance Not Added";
                        $_SESSION['status_code'] = "error";
                      
                    }

            }

                    
        } 
        $query1 = "INSERT INTO check_attendance_marked(date,class_id) VALUES(CURDATE(),'$class_id')";
                    $query_run1 = mysqli_query($connection,$query1);



                            if($query_run1)
                            {
                                // echo "Saved";
                                $_SESSION['attendanceStatusHistory'] = "Attendance History Added";
                                $_SESSION['status_code'] = "success";
                                header('Location: attendance.php');
                            
                            }
                            else 
                            {
                                $_SESSION['attendanceStatusHistory'] = "Attendance History Not Added";
                                $_SESSION['status_code'] = "error";
                                header('Location: attendance.php');  
                            
                            }
    
    }



    
    if(isset($_POST['attendanceEditSubmit_btn']))
    {        $sid = $_POST['sid'];
        $class_id = $_POST['viewclass_idAttendance'];
        $currentDate = date('m/d/Y');

        if(!empty($_POST['absentid'])) {    
            foreach($_POST['absentid'] as $value){

                $query1 = "DELETE  From attendance WHERE date = curdate() AND class_id = $class_id";
                $query_run1 = mysqli_query($connection,$query1);
                
              
                $query = "INSERT attendance(class_id,studentid,s_rollno,date) VALUES ('$class_id',$sid,'$value',CURDATE()) ";
                $query_run = mysqli_query($connection,$query);

                   
                    if($query_run)
                    {
                        // echo "Saved";
                        $_SESSION['attendanceStatus'] = "Attendance Updated Successfully";
                        $_SESSION['status_code'] = "success";
                     
                        $_SESSION['attendanceStatusHistory'] = "Attendance History Added";
                        $_SESSION['status_code'] = "success";
                        header('Location: attendance.php');
                    
                   
                    }
                    else 
                    {
                        $_SESSION['attendanceStatus'] = "Attendance Not Updated";
                        $_SESSION['status_code'] = "error";
                        $_SESSION['attendanceStatusHistory'] = "Attendance History Not Added";
                        $_SESSION['status_code'] = "error";
                        header('Location: attendance.php');  
                    
                      
                    }

            }

                    
        } 
       


                            
                       
    }




    if(isset($_POST['generate_btn']))
    {

        $invoice_due_date = $_POST['due_date'];
        $year_of_fee_invoice = $_POST['year_of_fee_invoice'];
        $month_of_issuance_fee_invoice = $_POST['month_of_fee_invoice'];

        $date = $year_of_fee_invoice.'-'.$month_of_issuance_fee_invoice.'-'.$invoice_due_date;
        


        $query1 = "INSERT INTO  
        feespaymentnew( fees_id, sid, user_id, s_rollno, s_fname, s_lname, class_id, fees_amount_per_month) 
        SELECT
         fees_id, sid, user_id, s_rollno, s_fname, s_lname, class_id, fees_amount
          FROM
           feesnew ";

        $query_run1 = mysqli_query($connection,$query1);



          $query = "UPDATE feespaymentnew SET invoice_due_date='$date', month='$month_of_issuance_fee_invoice' WHERE month='' ";
         $query_run = mysqli_query($connection,$query);
    

         
         $query2 = "INSERT INTO `invoice_records`( `month`,  `due_date`) VALUES ($month_of_issuance_fee_invoice,'$date')";
         $query_run2 = mysqli_query($connection,$query2);
    
        if($query_run1)
        {
    
            $_SESSION['status'] = "Invoice Added";
         
        }
        else{
            $_SESSION['status'] = "Invoice Addition Failed";
           
        }

        if($query_run)
        {
    
            $_SESSION['successstory'] = "Invoice Generated for month # " . "$month_of_issuance_fee_invoice";
            header('Location:generateInvoice.php');
        }
        else{
            $_SESSION['successstory'] = "Invoice Generation Failed for" . "$month_of_issuance_fee_invoice";
            header('Location:generateInvoice.php');
        }

    }


    
if(isset($_POST['deleteinvoice_btn']))
{
 
   
 
    $month_of_issuance_fee_invoice = $_POST['deletebymonth'];

    $query3 = "SELECT * FROM `fees_payment_history` WHERE month= $month_of_issuance_fee_invoice ";
    $query_run3 = mysqli_query($connection,$query3);

    if(mysqli_num_rows($query_run3)>0){
        $_SESSION['status'] = "Cannot Delete for Month # "."$month_of_issuance_fee_invoice" .". As Payment Process Has Started";
        header('Location:generateinvoice.php');
    }

    else{

    $query = "DELETE FROM `feespaymentnew` WHERE month= $month_of_issuance_fee_invoice ";
    $query_run = mysqli_query($connection,$query);

    $query2 = "DELETE FROM `invoice_records` WHERE month= $month_of_issuance_fee_invoice ";
    $query_run2 = mysqli_query($connection,$query2);



    
    if($query_run)
    {

        $_SESSION['status'] = "Invoice Data Has Been Deleted for month # "."$month_of_issuance_fee_invoice";
        header('Location:generateinvoice.php');
    }
    else{
        $_SESSION['status'] = "No Record Found . Invoice Data Has Not Been Deleted for month # "."$month_of_issuance_fee_invoice";
        header('Location:generateinvoice.php');
    }
}
}


if(isset($_POST['editinvoice_btn']))
{
 


   
 
    $month_of_issuance_fee_invoice = $_POST['editbymonth'];

        
    $invoice_due_date = $_POST['editdue_date'];
    $year_of_fee_invoice = '2020';
 

    $date = $year_of_fee_invoice.'-'.$month_of_issuance_fee_invoice.'-'.$invoice_due_date;


   
   

    $query = "UPDATE`feespaymentnew` SET due_date= $date WHERE month= $month_of_issuance_fee_invoice ";
    $query_run = mysqli_query($connection,$query);

    $query2 = "UPDATE `invoice_records` SET due_date= $date WHERE month= $month_of_issuance_fee_invoice ";
    $query_run2 = mysqli_query($connection,$query2);



    
    if($query_run)
    {

        $_SESSION['status'] = "Invoice Due Date Has Been Updated for month # "."$month_of_issuance_fee_invoice";
        header('Location:generateinvoice.php');
    }
    else{
        $_SESSION['status'] = "No Record Found . Invoice Due Date Has Not Been Updated for month # "."$month_of_issuance_fee_invoice";
        header('Location:generateinvoice.php');
    }

}




    if(isset($_POST['paymentsubmit_btn']))
    {
        $class_id = $_POST['viewclass_idAttendance'];
        $sid = $_POST['sid'];
        
        $currentDate = date('m/d/Y');
        $month=  $_POST['paymentbymonth'];

        $_SESSION['monthofpayment'] = $month;
        echo "Number 1";

        if(!empty($_POST['paymentid'])) {  
            echo "Number 1";
            foreach($_POST['paymentid'] as $value){
                echo "Number 1";

                $query1 = "UPDATE feespaymentnew SET fees_paid_amount = fees_amount_per_month, payment_date = CURDATE() , payment_status = 'fees paid' , checked='checked'  WHERE class_id = '$class_id' AND s_rollno = '$value' AND month='$month' ";
                $query_run1 = mysqli_query($connection,$query1);

               

                   
                    if($query_run1)
                    {
                         echo "Number success";
                        $_SESSION['paymentStatus'] = "Payment Added for class " ;
                        $_SESSION['status_code'] = "success";
                        
                   
                    }
                    else  
                    {echo "Number 2";
                        $_SESSION['paymentStatus'] = "Payment Not Added for class " ;
                        $_SESSION['status_code'] = "error";
                      
                    
                }

            }

                    
        } 
        $query2 = "INSERT INTO fees_payment_history(date,class_id,month,payment_status) VALUES(CURDATE(),'$class_id','$month','yes')";
                    $query_run2 = mysqli_query($connection,$query2);



                            if($query_run2)
                            {
                                echo "Number 3";
                                $_SESSION['paymentStatusHistory'] = "Payment  History Added";
                                $_SESSION['status_code'] = "success";
                                header('Location: paymentsuccessful.php');
                            
                            }
                            else 
                            {echo "Number 4";
                                $_SESSION['paymentStatusHistory'] = "Payment History Not Added";
                                $_SESSION['status_code'] = "error";
                                header('Location: paymentSuccessful.php');  
                            
                            }
    
    }

?>


