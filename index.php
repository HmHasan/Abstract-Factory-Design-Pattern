<!DOCTYPE html>
<a href="index.php">Create Student  </a> ||
<a href="show_teacher.php">Create Teacher  </a> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    spl_autoload_register(function($class){
        include("config/".$class.".php");
    });
    $ob = new profile;
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $department = $_POST['department'];
        $roll = $_POST['roll'];

        $ob->setname($name);
        $ob->setdepartment($department);
        $ob->setroll($roll);

        if($ob->insert())
        {
            echo "New Record Successfully Created";
        }

        else
        {
            echo "something Wrong";
        }


    }
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $roll = $_POST['roll'];

        $ob->setname($name);
        $ob->setdepartment($department);
        $ob->setroll($roll);

        if($ob->update($id))
        {
            echo "Update Successfully ";
        }

        else
        {
            echo "something Wrong";
        }


    }

    if(isset($_GET['action'])&& $_GET['action']=='delete')
    {
        $id = $_GET['id'];
        $result = $ob->delete($id);

        if($result==true)
        {
            echo "Data Delete Successfully";
        }
    }

    

    
    
    ?>

    <?php
    


    if(isset($_GET['action'])&& $_GET['action']=='edit')
    {
        $id = $_GET['id'];
        $result = $ob->GetById($id);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $result['id'];?>">
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
            </tr>
            <tr>
                <td>Department : </td>
                <td>
                    <input type="text" name="department" value="<?php echo $result['department'];?>">
                </td>
            </tr>
            <tr>
                <td>Roll : </td>
                <td><input type="number" name="roll" value="<?php echo $result['roll'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="update">Update</button></td>
            </tr>

        </table>

    </form>

        </form>
   <?php } else {?>
    
   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Department : </td>
                <td>
                    <input type="text" name="department">
                </td>
            </tr>
            <tr>
                <td>Roll : </td>
                <td><input type="number" name="roll"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>

        </table>

    </form>
   <?php } ?>
    <table>
        <table border="3">
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Department</td>
                <td>Roll</td>
                <td>Action</td>
                
            </tr>

            <?php 
            $i = 0;
            foreach($ob->Show() as $key=>$value)
            {
                $i++;
           
            
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['department'];?></td>
                <td><?php echo $value['roll'];?></td>
                <td><?php echo "<a href='index.php?action=edit&id=$value[id]'>Edit</a>"?> || 
                <?php echo "<a href='index.php?action=delete&id=".$value['id']."'onClick='return confirm(\"Are You Sure\")'>Delete</a>"?>
                </td>
            </tr>
            <?php  } ?>
        </table>
    </table>

</body>
</html>