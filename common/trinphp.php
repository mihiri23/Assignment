<tr>
                                <td>
                                    <img src="<?php echo $uimage; ?>" class="style1" />
                                </td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td> <?php echo $row['user_fname'] . " " . $row['user_lname']; ?></td>
                                <td><?php echo $row['user_gender']; ?></td>  
                                <td><?php echo $row['user_doj']; ?></td>    
                                <td><?php echo $row['user_status']; ?></td>
                                <td>
                                    <a href="../view/viewuser.php?user_id=<?php echo $row['user_id']; ?> ">
                                        <button type="button" class="btn btn-sm btn-primary">View</button>
                                    </a>

                                    <a href="../view/updateuser.php?user_id=<?php echo $row['user_id']; ?> ">
                                        <button type="button" class="btn btn-sm btn-primary">Update</button>
                                    </a>

                                     <a href="../controller/usercontroller.php?user_id=<?php echo $row['user_id']; ?>&status=<?php echo $status; ?>&action=ACDAC&page=<?php echo $page; ?>">
                                    <button type="button" 
                                            class="btn btn-sm btn-<?php echo $style; ?>" onclick="return confirmation('<?php echo $sname; ?>')">
                                        <?php echo $sname; ?>
                                    </button>
                                    </a>
                                </td>
                            </tr>
