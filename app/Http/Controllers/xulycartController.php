<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Products;
use App\Hoadon;
use App\Ct_hoadon;

class xulycartController extends Controller
{
    function addCart(Request $request){
    	if ($request->ajax()) {
    		$masp = $request->get('masp');
    		$product = Products::find($masp);
    		Cart::add(['id' => $masp, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]]);
    		$count = Cart::count();
    		return $count;
    	}
    }

    function deleteCart($rowId){
    	Cart::remove($rowId);
    	return redirect('xem-gio-hang.html');
    }

    function deleteAllCart(){
    	Cart::destroy();
    	return redirect('xem-gio-hang.html');
    }

    function CompletedOrderCart(Request $request){
    	if ($request->ajax()) {
    		$phone_pay = $request->get('phone_pay');
    		$name_pay = $request->get('name_pay');
    		$address_pay = $request->get('address_pay');
    		$email_pay = $request->get('email_pay');
    		$note_pay = $request->get('note_pay');
    		$hoadon = new Hoadon;
    		$hoadon->hoten = $name_pay;
    		$hoadon->sdt = $phone_pay;
    		$hoadon->diachi = $address_pay;
    		$hoadon->email = $email_pay;
    		$hoadon->ghichu = $note_pay;
    		$hoadon->tongtien = Cart::subtotal();
    		$hoadon->save();
    		$content = Cart::content();
    		foreach ($content as $value) {
    			$ct_hoadon = new Ct_hoadon;
    			$ct_hoadon->ma_hd = $hoadon->id;
    			$ct_hoadon->id_product = $value->id;
    			$ct_hoadon->soluong = $value->qty;
    			$ct_hoadon->save();
    		}
    		Cart::destroy();
    		return 'oke';
    	}
    }

    function listCart(){
    	$hoadon = Hoadon::orderBy('id','DESC')->get();
    	return view('admin.cart.list',
    		[
    			'hoadon'=>$hoadon,
    		]
    	);
    }

    function viewDetailCart($id){
    	$hoadon = Hoadon::find($id);
    	$ct_hoadon = Ct_hoadon::where('ma_hd',$id)->get();
    	return view('admin.cart.view',
    		[
    			'hoadon' => $hoadon,
    			'ct_hoadon' => $ct_hoadon,
    		]
    	);
    }

    function delete_Cart($id){
    	$hoadon = Hoadon::find($id);
    	$hoadon->delete();
    	return redirect('admin/cart/list')->with('msg','Xóa hóa đơn thành công');
    }

    function confirmCart($id){
    	$acceptFlag = Hoadon::acceptCart($id);
    	return response()->json([
    		"status" => (int)$acceptFlag
    	]);
    }

    function updateCart(Request $request){
    	if ($request->ajax()) {
    		$rowId = $request->get('rowId');
    		$qty = $request->get('qty');
    		Cart::update($rowId, $qty);
    		$content = Cart::content();
            $total = Cart::subtotal();
?>
			<tr>
				<th> STT </th>									
				<th> Tên sản phẩm </th>
				<th> Hình </th>			
				<th> Số lượng </th>
				<th> Giá </th>
				<th> Thành tiền </th>
				<th> Xóa SP</th>
				<th> Cập nhật </th>
			</tr>
			<?php 
			foreach($content as $row){
			?>
			<tr>
				<td>1</td>
				<td><?php echo $row->name ?></td>
				<td>
					<img width="80px" src="upload/image/<?php echo $row->options->image ?>">
				</td>
				<td><input class="qty" type="number" value="<?php echo $row->qty ?>" name="" min="1"></td>
				<td><?php echo number_format($row->price) ?> VNĐ</td>
				<td><?php echo number_format($row->qty*$row->price) ?> VNĐ</td>
				<td>
					<a href="xoagiohang/<?php echo $row->rowId ?>">
						<img width="20px" src="pages/image/delete_icon_16.png"">
					</a>
				</td>
				<td>
					<a class="updateCart" rowId="<?php echo $row->rowId ?>" href="javascript:void(0)">
						<img width="25px" src="pages/image/update.png">
					</a>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="5"><span style="font-weight: bold;">Tổng tiền hàng</span></td>
				<td colspan="3"><span class="total" style="font-weight: bold; color: blue;"><?php echo number_format($total) ?> VNĐ</span></td>
			</tr>
			<tr>
				<td colspan="4">
					<a style="font-weight: bold; color: green;" href="">Tiếp tục mua hàng </a>
					<span style="margin: 0 10px">-</span>
					<a style="font-weight: bold; color: green;" href="xoatoanbogiohang">Xóa giỏ hàng</a>
				</td>
			</tr>
<?php

    	}
    }
}

?>