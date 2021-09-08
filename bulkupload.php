<?php
function connectdb(){
    // DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','dunzo');
// Establish database connection.
try
{
   // $link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
return $dbh;
}

function clean($string) 
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    $string = strtolower($string); // Convert to lowercase

    return $string;
}
if(isset($_POST["submit"]))
{
    $dbh = connectdb();
    // check there are no errors
    if($_FILES['csv']['error'] == 0)
    {
        $name = $_FILES['csv']['name'];
        $ext = 'csv';
        $type = $_FILES['csv']['type'];
        $tmpName = $_FILES['csv']['tmp_name'];
    
        // check the file is a csv
        if($ext === 'csv')
        {
            if(($handle = fopen($tmpName, 'r')) !== FALSE) 
            {
                // necessary if a large csv file
                set_time_limit(0);
    
                $row = 0;
    
                while(($data = fgetcsv($handle, 300000, ',')) !== FALSE) 
                {
                    // number of fields in the csv
                    $col_count = count($data);
                    //echo $col_count; echo "<br>";
                    if($row>0)
                    {
                        $imagename=$data[0];
                        $price=$data[1];
                        $product_name=$data[2];
                        list($weight,$unit)=@explode(" ",$data[3]);
                        $category=trim($data[4]);
                        $subcategory=trim($data[5]);
                        $hsn=$data[6];
                        
                        //check for category exists
                        $catsql="SELECT category_id FROM category WHERE LOWER(category_name)='".strtolower($category)."'";
                        $catquery = $dbh->prepare($catsql);
                        $catquery->execute();
                        $catdata=$catquery->fetchAll(PDO::FETCH_OBJ);
                        
                        //inserting category
                        if(count($catdata)==0)
                        {
                            $sql="INSERT INTO  category(category_name,category_slug,category_status) VALUES('".addslashes($category)."','".clean(clean($category))."','1')";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $categoryid = $dbh->lastInsertId();
                        }
                        else
                        {
                            $categoryid=$catdata[0]->category_id;
                        
                        }
                        
                         //check for sub category exists
                         $subcatsql="SELECT category_id FROM category WHERE LOWER(category_name)='".strtolower($subcategory)."'";
                         $subcatquery = $dbh->prepare($subcatsql);
                         $subcatquery->execute();
                         $subcatdata=$subcatquery->fetchAll(PDO::FETCH_OBJ);
                         
                         //inserting category
                         if(count($subcatdata)==0)
                         {
                             $sql="INSERT INTO  category(category_name,parent_id,category_slug,category_status) VALUES('".addslashes($subcategory)."','".$categoryid."','".clean(clean($subcategory))."','1')";
                             $query = $dbh->prepare($sql);
                             $query->execute();
                             $subcategoryid = $dbh->lastInsertId();
                         }
                         else
                         {
                             $subcategoryid=$subcatdata[0]->category_id;
                         }


                        //check for product exists
                        $prodsql="SELECT products_id FROM products WHERE LOWER(products_name)='".strtolower(addslashes($product_name))."'";
                        $prodquery = $dbh->prepare($prodsql);
                        $prodquery->execute();
                        $proddata=$prodquery->fetchAll(PDO::FETCH_OBJ);

                        //inserting products
                        if(count($proddata)==0)
                        {
                            $sql="INSERT INTO  products(products_name,category_id,subcategory_id,products_image,products_status,products_slug) VALUES('".addslashes($product_name)."','".$categoryid."','".$subcategoryid."','".$imagename."','1','".clean(clean($product_name))."')";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $productid = $dbh->lastInsertId();
                        }
                        else
                        {
                            $productid=$proddata[0]->products_id;
                        }

                        //check for product options
                        $prodoptsql="SELECT option_id FROM products_options WHERE product_id='".$productid."' AND weight='".$weight."' AND LOWER(unit)='".strtolower($unit)."'";
                        $prodoptquery = $dbh->prepare($prodoptsql);
                        $prodoptquery->execute();
                        $prodoptdata=$prodoptquery->fetchAll(PDO::FETCH_OBJ);

                        //inserting product options
                        if(count($prodoptdata)==0)
                        {
                            $sql="INSERT INTO  products_options(product_id,weight,unit,price,stock,hsn)  VALUES('".$productid."','".$weight."','".$unit."','".$price."','1000','".$hsn."')";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $optionid = $dbh->lastInsertId();
                        }
                        else
                        {
                            $optionid=$prodoptdata[0]->products_options_id;
                        }

                      }
                    /*echo "<pre>";
                    print_r($data);
                    echo "</pre>";*/
                    $row++;
                }
            }
        }
    }
}
?>
  <!doctype html>
  <html lang="en" class="no-js">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="theme-color" content="#3e454c">
      <title>Add Multiple Items</title>

    </head>
    <body>
      <div class="ts-main-content">
         <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <h2 class="page-title">Bulk Upload
                </h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">Bulk Upload
                      </div>

                      <div class="panel-body">

                    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="bulkupload.php">
                        
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Upload File
                              <span style="color:red">*
                              </span>
                            </label>
                            
                            
                           
                            <div class="col-sm-4">
                              <input type="file" name="csv" class="form-control" value="Select CSV File">
                            </div>
                          </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                              <button class="btn btn-default" type="reset">Cancel
                              </button>
                              <button class="btn btn-primary" name="submit" type="submit">Bulk Upload
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </body>
  </html>
  