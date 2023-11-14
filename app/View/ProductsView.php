<div id="product"
     class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Продукты</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button name="add" id="add" type="button" onclick="addBtn()" class="btn btn-sm btn-outline-secondary">
                Добавить
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-calendar" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <label for="datepicker">На этой неделе</label>
                <input class="text tex" data-date-format="dd-mm-yyyy" id="datepicker" type="text" readonly/>
            </button>
        </div>
    </div>
</div>
<div id="form_add">
    <table>
        <thead>
        <tr>
            <th scope="col">Название продукта</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
            <th scope="col">Вид</th>
        </tr>
        </thead>
        <tbody>
        <form id="add_form">
            <tr>
                <td><input type="text" id="name" name="name" class=""></td>
                <td><input type="text" id="price" name="price" class=""></td>
                <td><input type="text" id="count" name="count" class=""></td>
                <td><input type="text" id="vis" name="vis" class=""></td>
                <td>
                    <button name="btn_add" id="" type="submit" onclick="addContent()">Добавить</button>
                </td>
            </tr>
        </form>
        </tbody>
    </table>
</div>
<div id="reload">
    <div class="d-flex flex-column" id="div_p">
        <script src="../../style/bootstrap5/js/product-page-functions.js"></script>
        <?php

        use app\Controller\ControllerProducts;

        $result = (new ControllerProducts())->result;

        ?>
        <div class="d-flex">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название продукта</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Вид</th>
                    <th scope="col">Цена при акции</th>
                    <th scope="col">Акция товара</th>
                    <th scope="col">Редактировать</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($result as $key) {
                    $i++;
                    ?>
                    <form id="form_post_<?php echo $i ?>">
                        <tr>
                            <th scope="row"><input class="text border-0 w-25" type="text" id="id_<?php echo $i ?>"
                                                   name="id"
                                                   value="<?php echo $key['id']; ?>" readonly></th>
                            <td><input class="text border-0 w-100" name="name" id="name_p<?php echo $i ?>"
                                       type="text"
                                       value="<?php echo $key['name']; ?>" readonly></td>
                            <td><input class="text border-0 w-100" name="price" id="price_<?php echo $i ?>"
                                       type="text"
                                       value="<?php echo $key['price']; ?>" readonly></td>
                            <td><input class="text border-0 w-100" name="count" id="count_<?php echo $i ?>"
                                       type="text"
                                       value="<?php echo $key['count']; ?>" readonly></td>
                            <td>
                                <label for="st_<?php echo $i ?>">Видимость товара:</label>
                                <input name="st" id="st_<?php echo $i ?>" class="border-0" type="text"
                                       st(<?php echo $i ?>)
                                       readonly>
                                <select name="vis" class="select border-0 w-100" id="sel_<?php echo $i ?>"
                                        hidden="hidden">
                                    <option <?= ($key['vis'] == 'true') ? "SELECTED" : "" ?> value="true">Показать
                                        товар
                                    </option>
                                    <option <?= ($key['vis'] != 'true') ? "SELECTED" : "" ?> value="false">Убрать
                                        товар
                                    </option>
                                </select>

                            </td>
                            <td><input class="text border-0 w-100" name="stock_price" id="stock_price_<?php echo $i ?>"
                                       type="text"
                                       value="<?php echo $key['stock_price']; ?>" readonly></td>
                            <td><input class="text border-0 w-100" name="stock" id="stock_<?php echo $i ?>"
                                       type="text"
                                       value="<?php echo $key['stock']; ?>" readonly>
                                <input type='number' size='30' id='stock_<?php echo $i ?>' name='stock'
                                       value="<?php echo $key['stock']; ?>"/>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-light" value="true" onclick="unv(<?php echo $i ?>)"
                                        id="eye_<?php echo $i ?>" data-option="true"><i
                                        class="bi bi-eye"></i></button>
                                <button type="submit" class="btn btn-light" value="false" onclick="v(<?php echo $i ?>)"
                                        id="unEye_<?php echo $i ?>" data-option="false"><i
                                        class="bi bi-eye-slash"></i></button>
                                <button class="btn btn-success" type="submit" id="btn_ch<?php echo $i ?>"
                                        hidden="hidden"
                                        onclick="onUpdate(<?php echo $i ?>);"><i class="bi bi-check"></i></button>
                                <button class="btn btn-danger" type="button" id="btn_up<?php echo $i ?>"
                                        onclick="onWrite(<?php echo $i ?>);"><i class="bi bi-pen"></i></button>
                            </td>
                        </tr>
                    </form>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <script src="../../style/bootstrap5/js/product-page-functions.js"></script>
    </div>
</div>
<?php
error_reporting(false);
$o = new ControllerProducts();
$o->updateProduct();
?>
