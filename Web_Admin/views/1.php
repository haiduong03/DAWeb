<?php
include_once './controller/productcontroller.php';
foreach (printProduct() as $product) {
    echo '  
                                <tbody>
                                    <tr>
                                        <td data-label="Name">' . $product->get_name() . '</td>
                                        <td data-label="Detail" width="500">' . $product->get_detail() . '</td>
                                        <td data-label="Brand">' . $product->get_brand() . '</td>
                                        <td data-label="Type">' . $product->get_type() . '</td>
                                        <td data-label="Size">' . $product->get_size() . '</td>
                                        <td data-label="Color">' . $product->get_color() . '</td>
                                        <td data-label="Img"><img src="' . $product->get_image() . '" width="100"></td>
                                        <td data-label="Price">' . $product->get_price() . '</td>
                                        <td data-label="Price">' . $product->get_promotion() . '</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap">
                                                <button class="button small green --jb-modal" data-target="sample-modal-2" >
                                                    <a href="product_action.php?id=' . $product->get_id() . '"> <span class="icon"><i class="mdi mdi-pen"></i></span></a>
                                                </button>
                                                <form action="../controller/productcontroller.php?id=' . $product->get_id() . '" method="post">
                                                    <button class="button small red --jb-modal" data-target="sample-modal" type="submit"  id="product" name="product" value="delete">
                                                        <span class=" icon"><i class="mdi mdi-trash-can"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>';
}
