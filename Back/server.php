<?php

require_once 'App.php';

$movieApp = new App();
// CConnect to DB
try
{    
    $db = new PDO('mysql:host=127.0.0.1;dbname='. $movieApp->getDbName() ,'root','');    
}catch( PDOException $e) 
{
    echo 'Connection failed:  exception was thrown: ' . $e->getMessage();   
}


$page = isset($_GET['p']) ? $_GET['p'] : '';

if($page == 'create')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $stmnt = $db->prepare("insert into crud values('',?,?,?,?)");
    $stmnt->bindParam(1,$name);
    $stmnt->bindParam(2,$email);
    $stmnt->bindParam(3,$phone);
    $stmnt->bindParam(4,$address);
    
    if( $stmnt->execute() )
    {
        echo "Succeed adding data";

    }else
    {
        echo "failed adding data";

    }
    
    
}else if($page == 'update')
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $stmnt = $db->prepare("update crud set name=?, email=?, phone=?, address=? where id=?");
    $stmnt->bindParam(1,$name);
    $stmnt->bindParam(2,$email);
    $stmnt->bindParam(3,$phone);
    $stmnt->bindParam(4,$address);
    $stmnt->bindParam(5,$id);
    
    if( $stmnt->execute() )
    {
        echo "Succeed update data";

    }else
    {
        echo "failed update data";

    }

}else if($page == 'del')
{
    $id = $_GET['id'];
    $stmnt = $db->prepare("delete from crud where id=?");
    $stmnt->bindParam(1,$id);
    
    if( $stmnt->execute() )
    {
        echo "Succeed Delete data";

    }else
    {
        echo "failed Delete data";

    }

}else //getAll
{
    try
    {
        $stmnt = $db->prepare("select * from crud order by id desc");
        $ok = $stmnt->execute();
    }catch( PDOException $e) 
    {
        echo 'pdo prepare/execute failed:  exception was thrown: ' . $e->getMessage();   
    }
        while($row=$stmnt->fetch())
        {
            ?><tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['address']?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#update-<?php echo $row['id']?>">Edit</button>
                    <!-- Modal -->
                    <div class="modal fade" id="update-<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="updateLabel-<?php echo $row['id']?>">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="updateLabel-<?php echo $row['id']?>">Edit data</h4>
                            </div>
                            <form>
                                <div class="modal-body">
                                <input type="hidden" id="<?php echo $row['id']?>" value="<?php echo $row['id']?>">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name-<?php echo $row['id']?>" value="<?php echo $row['name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="email" class="form-control" id="email-<?php echo $row['id']?>" value="<?php echo $row['email']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control" id="phone-<?php echo $row['id']?>" value="<?php echo $row['phone']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Adress</label>
                                        <textarea class="form-control" id="address-<?php echo $row['id']?>" placeholder="address..."><?php echo $row['address']?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" onclick="CRUD.Update(<?php echo $row['id']?>)" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <button onclick="CRUD.Delete(<?php echo $row['id']?>)" class="btn btn-danger">Delete</button>
                </td>
            </tr><?php    
        }
}

?>