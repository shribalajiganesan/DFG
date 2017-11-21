<?php $this->load->view('common/header_inner'); ?>
<style type="text/css">
  p,h1,h2,td{
    color: #fff;
  }
</style>
<section id="order-history" class="color-bg-green section-p-lg ordersection-container main-container clearfix">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="order-details">
            <h2 class="section-title">Order History</h2>
            <!-- <p>You have not made any previous orders!</p> -->
            <div class="orderhistory-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Order ID</th>
                      <th>Order Date & Time</th>
                      <th>Status</th>
                      <th>Item</th>
                      <th width="25%">Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php //print_r($orders); ?>
                  <?php if(count($orders) > 0) {  $i = 1;
                    foreach($orders as $order) { ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $order['order_number'] ?></td>
                      <td><?= date('d.m.Y H:i A',strtotime($order['ordered_on'])) ?></td>
                      <td><?= $order['order_status'] ?></td>
                      <td><?= $order['item_name'] ?></td>
                      <td><?= $order['item_qty'] ?></td>
                      <td>$ <?= $order['total_price'] ?></td>
                    </tr>
                  <?php  } 
                  ?>

                  <?php } else { ?>
                    <tr><td colspan="7">No orders found.</td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('common/footer_inner'); ?>