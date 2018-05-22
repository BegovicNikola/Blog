            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <?php 
                        if(isset($_POST['submit'])){
                            $search = $_POST['search'];
                            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'";
                            $search_query = mysqli_query($connection, $query);

                            if(!$search_query){
                                die("QUERY FAILED" . mysqli_error($connection));
                            }else{

                            }

                            $count = mysqli_num_rows($search_query);
                            if($count == 0){
                                echo 'No matching results';
                            }
                        }
                    ?>
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="sumbit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                   $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connection, $query);
                                    
                                    while($row = mysqli_fetch_assoc($select_categories)){
                                        $cat_title = $row['cat_title'];
                                        echo "<li><a href='#'>{$cat_title}</a></li>";
                                    } 
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'widget.php'; ?>
            </div>