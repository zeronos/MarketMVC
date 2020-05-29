<html>
<?php include("./lib/head.php"); ?>


<body>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#creatGoods">
                Create Goods
            </button>
        </div>
        <div class="col">
            <form class="form-inline mr-auto" method ="get">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name ="key-goodsid">
                <input type="hidden" name="controller" value="goods">
                <input type="hidden" name="action" value="search_goods">
                <button class="btn btn-info" type="submit">Search</button>
            </form>

        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered" text>
            <thead>
                <tr>
                    <th scope="col">Goods name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Classify</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>


                <!--creat Modal -->
                <div class="modal fade" id="creatGoods" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Goods</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <label class="col-form-label">Goods name:</label>
                                        <input type="text" class="form-control" id="goodsname" name="goodsname">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Price:</label>
                                        <input class="form-control" id="message-text" name="price"></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Classify:</label>
                                        <select name="class" class="form-control">
                                            <?php
                                            foreach ($class_list as $class) {
                                                echo "<option value='$class->class_id'>$class->class_name</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="controller" value="goods">
                                        <input type="hidden" name="action" value="add_goods">
                                    </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">OK</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!--delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="del-goodsname" name="del-goodsname" readonly>
                                        <input type="hidden" class="form-control" id="del-goodsid" name="del-goodsid">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="controller" value="goods">
                                        <input type="hidden" name="action" value="delete_goods">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--update Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Goods</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <label class="col-form-label">Goods name:</label>
                                        <input type="text" class="form-control" id="update_goodsname" name="update_goodsname">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Price:</label>
                                        <input class="form-control" id="update_price" name="update_price"></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Classify:</label>
                                        <select name="update_class" id="update_class" class="form-control">
                                            <?php
                                            foreach ($class_list as $class) {
                                                echo "<option value='$class->class_id'";
                                                /*if ($class->class_id == $goods_id_update->classFK)
                                                {
                                                    echo "selected";
                                                }*/
                                                echo ">$class->class_name</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="update_goodsid" id="update_goodsid">
                                        <input type="hidden" name="controller" value="goods">
                                        <input type="hidden" name="action" value="update_goods">
                                    </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">OK</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                foreach ($goods_list as $goods) { ?>
                    <tr>
                        <input type="hidden" id="del-id" value="<?php echo "$goods->goods_id"; ?>">
                        <td><?php echo "$goods->goods_name"; ?></td>
                        <td><?php echo " $goods->price"; ?></td>
                        <td><?php echo " $goods->classname"; ?></td>
                        <td><button type="button" class="btn btn-primary update_data" id-data="<?php echo "$goods->goods_id"; ?>" name-data="<?php echo "$goods->goods_name"; ?>" price-data="<?php echo "$goods->price"; ?>" class_id-data="<?php echo "$goods->classFK"; ?>" classname-data="<?php echo "$goods->classname"; ?>">Update</button></td>
                        <td><button type="button" class="btn btn-danger delete_data" id-data="<?php echo "$goods->goods_id"; ?>" name-data="<?php echo "$goods->goods_name"; ?>" price-data="<?php echo "$goods->price"; ?>" class-data="<?php echo "$class_list->class_name"; ?>">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</body>
<?php include("./lib/footer.php") ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var id = $(this).attr('id-data');
            var name = $(this).attr('name-data');
            var price = $(this).attr('price-data');
            var message = name + "     " + "price: " + price;

            $('#del-goodsid').val(id);
            $('#del-goodsname').val(message);

            console.log(id);
            console.log(name);
            console.log(price);
            console.log(message);

            $('#deleteModal').modal("show");
        });


        $(document).on('click', '.update_data', function() {
            var id = $(this).attr('id-data');
            var name = $(this).attr('name-data');
            var price = $(this).attr('price-data');
            var classname = $(this).attr('class_id-data');

            $('#update_goodsid').val(id);
            $('#update_goodsname').val(name);
            $('#update_price').val(price);
            $('#update_class').children("option:selected").text(classname);
            //alert (classname);
            console.log(name);
            console.log(price);
            //console.log(message);

            $('#updateModal').modal("show");
        });
    });
</script>

</html>
