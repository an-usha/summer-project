<html>
    <head>
        <title>Patient Registeration System</title>
        <link rel="stylesheet" href="../css/doc_home.css" />
        <link rel="stylesheet" href="../css/allpatient.css" />
        <link rel="stylesheet" href="../css/newpres.css" />

    </head>
    <body>
       <?php 
            include 'doc_home.php';
            include 'dbconnect.php';
            if(empty($_SESSION['username'])){
                header("location:Login/login1.php");
                exit();
            }
            else{
        ?>
             
    <?php 
    $username=$_SESSION['username'];
    $q="SELECT * FROM admin WHERE username='$username'";
    $result=mysqli_query($con,$q);
    if (mysqli_num_rows($result)>0)
    {
      while ($row=mysqli_fetch_array($result)) 
      {
        $d_id=$row['d_id'];
      }
    }
            }
            
        ?>
        <form method="post"  action="prescinsert.php" >
            <div class="left">
                <h3>New Presribtion</h3>
                <div class="my_box">
                    <div class="field_box">
                   
                        <select name="name" id="name" required>
                            <option value="" disabled hidden selected>Select Patients name</option>
                            <?php 
                                $query1 ="SELECT * FROM reg_patient";
                                $result1 = mysqli_query($con,$query1);
                                while($row1 = mysqli_fetch_assoc($result1) ){
                            ?>
                            <option  value="<?php echo $row1['ID'];?>"><?php echo $row1['Name'];?>
                            </option>
                            <?php }   ?>             
                        </select>
                    </div>
                    <div class="doc">
                        <div class="field_box">
                            <input type="hidden" name="docname" value="<?php $username=$_SESSION['username'];
                            $q="SELECT * FROM admin WHERE username='$username'";
                            $result=mysqli_query($con,$q);
                            if (mysqli_num_rows($result)>0)
                            {
                                while ($row=mysqli_fetch_array($result)) 
                                {
                                    $name=$row['Name'];
                                }
                            }
                            $q_doc="SELECT * FROM add_doc WHERE Name='$name'";
                            $result_doc=mysqli_query($con,$q_doc);
                            if (mysqli_num_rows($result_doc)>0)
                            {
                                while ($row_doc=mysqli_fetch_array($result_doc)) 
                                {
                                    $doc_id=$row_doc['d_id'];
                                }
                            }
                            echo $doc_id;
                            
                            ?>">
                        </div>
                    </div>
                    <div class="p_date">
                        <div class="field_box">
                            <input type="date" name="p_date" id="p_date" required><br>
                        </div>
                    </div>
                    <div class="button_box">
                        <input type="submit" name="add" id="btnSubmit" value="Create Prescription">
                    </div>
                </div>
            </div>

            <div class="right_up">
                <div class="addmed">
                    <div class="rbox1">
                        <h3>Add Prescription</h3>
                        <div class="button_box1"><input type="button" name="med_add" value="Add Medicine" onclick="add_med()"></div>
                        <div class="button_box1"><input type="button" name="test_add" value="Add Test" onclick="add_test()"></div>
                        <div class="field1">
                            <select name="medname[]" id="medname" >
                                <option value=""  disabled hidden selected>Select Medicine name</option>
                                <?php 
                                  $query3 ="SELECT * FROM new_med";
                                  $result3 = mysqli_query($con,$query3);
                                  while($row3 = mysqli_fetch_assoc($result3) ){
                                ?>
                                <option  value="<?php echo $row3['m_id'];?>"><?php echo $row3['M_name']." - ".$row3['Mg'];?>
                                </option>
                                <?php }   ?>    
                            </select>
                            <br><label class="note">Note:<span id="demo"></span><textarea class="text" name="note" placeholder="Note..." id="note"></textarea></lable><br>
                        </div>
                        
                    </div>
                    <div class="addtest">
                            <div class="rbox2">
                                <div class="field2"> 
                                    <select name="testname[]" id="testname" >
                                        <option value=""  disabled hidden selected>Select Test name</option>
                                        <?php 
                                          $query4 ="SELECT * FROM new_test";
                                          $result4 = mysqli_query($con,$query4);
                                          while($row4 = mysqli_fetch_assoc($result4) ){
                                        ?>
                                        <option  value="<?php echo $row4['t_id'];?>"><?php echo $row4['Test_name'];?>
                                        </option>
                                        <?php }   ?>    
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </form>

    <script src="../Java/jquery-1.4.1.min.js"></script>
    <script>
        function add_med()
        {
            var box_count=jQuery("#box_count").val();
            box_count++;
            jQuery("#box_count").val(box_count);
            jQuery(".right_up").append('<div class="rbox1" id="box_loop_'+box_count+'"><div class="field1"><select name="medname[]" id="medname"><option value="" disabled hidden selected>Select Medicine name</option><?php 
            $query3 ="SELECT * FROM new_med";$result3 = mysqli_query($con,$query3);while($row3 = mysqli_fetch_assoc($result3) ){ ?> <option value="<?php echo $row3['m_id'];?>"><?php echo $row3['M_name']." - ".$row3['Mg'];?>
            </option><?php } ?> </select><br><label class="note">Note:<span id="demo"></span></label><textarea class="text" name="note" placeholder="Note..." id="note"></textarea><br></div> <div class="remove"><input type="button" name="submit" id="remove" value="Remove Medicine" onclick=remove_med("'+box_count+'")></div></div>');
        }
        function add_test()
        {
            var box_countt=jQuery("#box_countt").val();
            box_countt++;
            jQuery("#box_countt").val(box_countt);
            jQuery(".right_up").append('<div class="rbox2" id="box_loopp_'+box_countt+'"><div class="field2"> <select name="testname[]" id="testname" required><option value=""  disabled hidden selected>Select Test name</option><?php 
            $query4 ="SELECT * FROM new_test";$result4 = mysqli_query($con,$query4);while($row4 = mysqli_fetch_assoc($result4) ){?><option  value="<?php echo $row4['t_id'];?>"><?php echo $row4['Test_name'];?>
            </option><?php }   ?>  </select></div><div class="remove_test"><input type="button" name="sub" id="remove" value="Remove Test" onclick=remove_test("'+box_countt+'")></div></div>');
        }
        function remove_med(box_count)
        {
            jQuery("#box_loop_"+box_count).remove();
            var box_count=jQuery("#box_count").val();
            box_count--;
            jQuery("#box_count").val(box_count);
        }

        function remove_test(box_countt)
        {
            jQuery("#box_loopp_"+box_countt).remove();
            var box_countt=jQuery("#box_countt").val();
            box_countt--;
            jQuery("#box_countt").val(box_countt);
        }
    
    </script>
    </body>
</html>