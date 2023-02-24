<?php
/*
 *This File are php function for website
 */
class Configration
{
  // Database Connection Variable.
  private $conn;
  /*=============================================
  * Database Usere Table AND Row Name Code Start
  ===============================================*/
  // Table Name
  private $usr_table_name = "users";
  // Row Name
  private $table_usr_id = "usr_id";
  private $table_usr_name = "usr_name";
  private $table_usr_email = "usr_email";
  private $table_usr_pwd = "usr_pwd";

  /*=============================================
  * Database Usere Table AND Row Name Code End
  ===============================================*/

  /*==============================================
  * Database Category Table AND Row Name Code Start
  ===============================================*/
  //Table Name
  private $cat_table_name = "category";
  //Row Name
  private $table_cat_id = "cat_id";
  private $table_cat_name = "cat_name";
  private $table_cat_dec = "cat_dec";
  private $table_cat_post_count = "post_count";
  /*==============================================
  * Database Category Table AND Row Name Code End
  ===============================================*/

  /*==============================================
  * Database Post Table AND Row Name Code Start
  ===============================================*/
  // Table Name
  private $post_table_name = "post";
  // Row Name
  private $table_post_id = "post_id";
  private $table_post_title = "post_title";
  private $table_post_content = "post_content";
  private $table_post_thumbnil = "post_thumbnil";
  private $table_post_catagory = "post_catagory";
  private $table_post_auth = "post_auth";
  private $table_post_date = "post_date";
  private $table_post_cmnt_cunt = "post_cmnt_cunt";
  private $table_post_summery = "post_summery";
  private $table_post_tag = "post_tag";
  private $table_post_stutas = "post_stutas";
  /*==============================================
  * Database Post Table AND Row Name Code End
  ===============================================*/


  // Constractor Function.
  public function __construct()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "digitalitsoft";

    // Create connection
    $this->conn = mysqli_connect($servername, $username, $password, $db_name);
  }
  // Login User
  public function login_usr($data)
  {
    //fontent user content
    $usr_email = htmlentities($data['usr_email']);
    $usr_pwd = md5($data['usr_pwd']);
    $query = "SELECT * FROM $this->usr_table_name WHERE 
    $this->table_usr_email='$usr_email' AND $this->table_usr_pwd='$usr_pwd'";
    $result = mysqli_query($this->conn, $query);
    if (mysqli_num_rows($result) == 1) {
      header("Location: dashboard.php");
      $row = mysqli_fetch_assoc($result);
      session_start();
      $_SESSION["name"] = $row['usr_name'];
      $_SESSION["email"] = $row['usr_email'];
    } else {
      return "Wrong Email or Password.";
    }
  }
  //Log Out Usere
  public function admin_log_out()
  {
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    session_destroy();
    header("Location: index.php");
  }

  // Category Insert Function
  public function cat_insert($data)
  {
    //fontent user content
    $cat_title = $data['cat_title'];
    $cat_desc = $data['cat_desc'];
    $post_count = 5;
    //database communaction
    if ($this->conn) {
      $query = "INSERT INTO $this->cat_table_name ($this->table_cat_name, $this->table_cat_dec, $this->table_cat_post_count) VALUES ('$cat_title', '$cat_desc', $post_count)";
      mysqli_query($this->conn, $query);
      return "Category Inserted!";
    } else {
      return "Category Not Inserted!";
    }
  }
  //Manage Category Function
  public function show_cat()
  {
    if ($this->conn) {
      $limit_cat_cunt = 0;
      // $query = "SELECT * FROM category ORDER BY cat_id DESC LIMIT 5 OFFSET $limit_cat_cunt";
      $query = "SELECT * FROM $this->cat_table_name ORDER BY cat_id DESC";
      $result = mysqli_query($this->conn, $query);
      return $result;
    }
  }
  // Post Insert Function.
  public function post_insert($data)
  {
    // fontent user content
    $post_title = strval($data['post_title']);
    $post_summery = htmlentities($data['post_summery']);
    $pos_cat = $data['pos_cat'];
    $post_thumb_tmp_name = $_FILES["post_thumb"]["tmp_name"];
    $post_thumb_name = "dit" . uniqid() . "soft.jpg";
    $post_content = htmlentities($data['post_content']);
    $post_tag = htmlentities($data['post_tag']);
    $post_status = $data['post_status'];
    $post_auth = "Admin";
    $post_comment = 15;
    //Post data inser query
    $query = "INSERT INTO $this->post_table_name ($this->table_post_title, $this->table_post_content, $this->table_post_thumbnil, $this->table_post_catagory, $this->table_post_auth, $this->table_post_date, $this->table_post_cmnt_cunt, $this->table_post_summery, $this->table_post_tag, $this->table_post_stutas) VALUES ('$post_title', '$post_content', '$post_thumb_name','$pos_cat','$post_auth',now(),$post_comment,'$post_summery','$post_tag','$post_status')";
    $result = mysqli_query($this->conn, $query);
    //image moveing
    move_uploaded_file($post_thumb_tmp_name, "upload/" . $post_thumb_name);
    return "Post Inserted!";
  }
  // Mange Post Function.
  public function show_post()
  {
    if ($this->conn) {
      //$limit_post_cunt = 0;
      // $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 5 OFFSET $limit_post_cunt";
      $query = "SELECT * FROM $this->post_table_name ORDER BY $this->table_post_id DESC";
      $result = mysqli_query($this->conn, $query);
      return $result;
    } else {
      return "Database Connection Failed.";
    }
  }
  //Post Category Name Showing
  public function post_cat_name($data)
  {
    if ($this->conn) {
      $post_cat_id = $data;
      $query = "SELECT $this->table_cat_name FROM $this->cat_table_name WHERE cat_id=$post_cat_id";
      $result = mysqli_query($this->conn, $query);
      $row = mysqli_fetch_assoc($result);
      return $row;
    }
  }
  // Edit Category Function
  public function edit_cat($data)
  {
    $edit_id = $data;
    if ($this->conn) {
      $query = "SELECT * FROM $this->cat_table_name WHERE cat_id= $edit_id";
      $result = mysqli_query($this->conn, $query);
      $row = mysqli_fetch_assoc($result);
      return $row;
    }
  }
  // Update Category Function
  public function update_cat($data)
  {
    if ($this->conn) {
      $up_cat_id = $data["cat_id"];
      $up_cat_name = $data["cat_title"];
      $up_cat_des = $data["cat_desc"];
      $query = "UPDATE category SET cat_name = '$up_cat_name', cat_dec ='$up_cat_des' WHERE category.cat_id = $up_cat_id";
      if (mysqli_query($this->conn, $query)) {
        return "Category Update Successfully!";
      }
    }
  }
  // Edit Post
  public function edit_post($data)
  {
    $edit_id = $data;
    if ($this->conn) {
      $query = "SELECT * FROM post WHERE post.post_id= $edit_id";
      $result = mysqli_query($this->conn, $query);
      $row = mysqli_fetch_assoc($result);
      return $row;
    }
  }
  // Update Post
  public function update_post($data, $img)
  {
    if ($this->conn) {
      $up_post_id = $data["post_id"];
      $up_post_title = $data["post_title"];
      $up_post_summery = $data["post_summery"];
      $up_post_cat = $data["post_cat"];
      $up_post_thumbnail_tmp = $_FILES["post_thumbnail"]['tmp_name'];
      $up_post_content = $data["post_content"];
      $up_post_tag = $data["post_tag"];
      $up_post_status = $data["post_status"];
      $post_thumb_name = "dit" . uniqid() . "soft.jpg";
      $old_img = $img;
      // Update Query
      // When Thumbnail want to change and add new thambnail
      if (!empty($_FILES["post_thumbnail"]['tmp_name'])) {
        $query = "UPDATE post SET post_title = '$up_post_title', post_content ='$up_post_content',post_thumbnil='$post_thumb_name',post_catagory='$up_post_cat',post_summery='$up_post_summery',post_tag='$up_post_tag',post_stutas='$up_post_status' WHERE post.post_id = $up_post_id";
        mysqli_query($this->conn, $query);
        move_uploaded_file($up_post_thumbnail_tmp, "upload/" . $post_thumb_name);
        if (!empty($_FILES["post_thumbnail"]['tmp_name'])) {
          unlink("upload/" . $old_img);
        }
        return "Post Update Successfully.";
      } else {
        //When thumbnail are same no change.
        $query2 = "UPDATE post SET post_title = '$up_post_title', post_content ='$up_post_content',post_catagory='$up_post_cat',post_summery='$up_post_summery',post_tag='$up_post_tag',post_stutas='$up_post_status' WHERE post.post_id = $up_post_id";
        mysqli_query($this->conn, $query2);
        return "Post Update Successfully!";
      }
    }
  }
  //Dashbord Data Show Function
  public function dash_show_data()
  {
    if ($this->conn) {
      $limit_das_post_cunt = 0;
      $query = "SELECT post.post_title, post.post_summery,category.cat_name,post.post_date,post.post_auth FROM post INNER JOIN category ON post.post_catagory = category.cat_id ORDER BY post.post_id DESC LIMIT 5 OFFSET $limit_das_post_cunt";
      if ($result = mysqli_query($this->conn, $query)) {
        return $result;
      }
    }
  }
  // Detele Category Function
  public function delete_cat($data)
  {
    $id = $data;
    if ($this->conn) {
      $qury = "DELETE FROM category WHERE category.cat_id = $id";
      if (mysqli_query($this->conn, $qury)) {
        return "Category Has been Deleted!";
      }
    }

  }
  // Delete Post Function
  public function delete_post($data)
  {
    $id = $data;
    if ($this->conn) {
      // Delete Image Feinding
      $dlt_query = "SELECT * FROM post WHERE post.post_id = $id";
      $rslt = mysqli_query($this->conn, $dlt_query);
      $row = mysqli_fetch_assoc($rslt);
      $old_img = $row['post_thumbnil'];
      // Delete Query
      $qury = "DELETE FROM post WHERE post.post_id = $id";

      if (mysqli_query($this->conn, $qury)) {
        if (isset($old_img)) {
          unlink("upload/" . $old_img);
        }
        return "Post Has been Deleted!";
      }
    }
  }

//Class End
}


?>