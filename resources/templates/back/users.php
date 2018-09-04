

                    <div class="col-lg-12">

                        <?php display_message(); ?>

                        <h1 class="page-header">
                            Users

                        </h1>

                        <a href="index.php?add_user" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php

                                    $user_query=query("SELECT * FROM users");
                                    confirm($user_query);
                                    while($row=fetch_array($user_query)){
                                      $user_id=$row['user_id'];
                                      $username=$row['username'];
                                      $user_email=$row['user_email'];

                                   ?>

                                    <tr>

                                      <td><?php echo $user_id; ?></td>
                                      <td><?php echo $username; ?></td>
                                      <td><?php echo $user_email; ?></td>
                                      <td><a class="btn btn-primary" href="index.php?edit_user=<?php echo $user_id;?>">Edit</a></td>
                                      <td><a class="btn btn-danger" href="index.php?delete_user=<?php echo $user_id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>

                                    </tr>
                       <?php } ?>
                                </tbody>
                            </table> <!--End of Table-->


                        </div>




                    </div>
