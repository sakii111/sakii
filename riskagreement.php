<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}
?>
<?php
	include("include/connection.php");
	$userid=$_SESSION['frontuserid'];
?>
<html lang="en" style="font-size: 104.5px;">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<?php include 'head.php';?>
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<link href="assets/css/inc/ionicons.min.css" rel="stylesheet">
		<style type="text/css" id="operaUserStyle">
			video {
			  filter: url('data:image/svg+xml,\
				<svg xmlns="http://www.w3.org/2000/svg">\
				  <filter id="sharpen">\
					<feConvolveMatrix order="3" preserveAlpha="true" kernelMatrix="1 -1 1 -1 -1 -1 1 -1 1"/>\
				  </filter>\
				</svg>#sharpen');
			}
		</style>
		<style>
			body::-webkit-scrollbar {
			  display: none;
			}
			.appBottomMenu {
				min-height: 56px;
				position: fixed;
				z-index: 9999;
				bottom: 0;
				left: 0;
				right: 0;
				background: #FFF;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
				padding-bottom: env(safe-area-inset-bottom);
				-webkit-box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
				box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
			}

			.appBottomMenu .item {
				width: 35%;
				text-align: center;
				height: 56px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
			}
			
			.appBottomMenu .item.active {
				position: relative;
			}

			.appBottomMenu .item>a {
				width: 100%;
				height: 56px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				padding: 0;
				-webkit-box-pack: center;
				justify-content: center;
				color: #868f8b !important;
				position: relative;
			}
			
			.appBottomMenu .item.active>a {
				color: #009688 !important;
			}
			
			.appBottomMenu .item p {
				margin: 0;
			}

			.appBottomMenu .item i {
				font-size: 26px;
				line-height: 0;
				margin-bottom: 17px;
				display: block;
			}

			.appBottomMenu .item span {
				display: block;
				font-size: 11px;
				position: absolute;
				left: 0;
				bottom: 7px;
				right: 0;
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-1dce78d0="" class="riskagreement">
			<nav data-v-1dce78d0="" class="top_nav">
				<div data-v-1dce78d0="" class="left">
					<img data-v-1dce78d0="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-1dce78d0="">Risk Disclosure Agreement</span>
				</div>
			</nav>
			<div data-v-1dce78d0="" class="content_agree">
				<div data-v-1dce78d0="" class="content">
					<h3 data-v-1dce78d0="" class="text-xs-center" style="margin-bottom: 12px;">Chapter 1.Booking/Collection Description</h3>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">Prepayment Booking/Recycling Customer should read and understand the business content carefully 
						before making prepayment bookings (prepayment lock price, payment settlement and shipment) /recovery or repurchase 
						(prepayment lock price, shipping payment) before making prepayment bookings to Terion Shop:
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">1. Before making an appointment/restoring the prepayment business, the customer should complete 
						the real name authentication in the mall and ensure that the name, ID number, bank account number, delivery address and 
						other information filled in are true, accurate and valid; Otherwise, the user will be liable for the consequences of false 
						information.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">2. Customers can order gold and silver products in advance at the shopping centre. Orders can be 
						cancelled by 01:30 a.m. on the same Saturday. When the customer pays the end payment, the mall receives the final payment 
						and arranges the delivery.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">If the customer does not pay the final pick-up by 01:30 a.m. on Saturday, the customer is deemed 
						to have made the last offer before the inventory and the booking is cancelled.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">3. Customers can make an appointment to recycle gold and silver products purchased at the gold point. 
						Pre-purchase recovery requires a credit margin and confirmation of actual possession of gold and silver products purchased from 
						the mall. Customers can cancel their reservation at any time before 01:30 on Saturday and the credit mark will be refunded after 
						deducting the increase or decrease in the value of the goods within the corresponding time.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">If the customer fails to deliver the goods to a shopping mall or shopping center at the designated 
						collection point by Saturday within the same week, or if the goods delivered do not meet the recycling standard test, the customer 
						will be deemed to have cancelled the reservation recovery and will bear the logistics and testing costs.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">4. Counting time: Daily 01:30-05:30 for the mall warehouse inventory time. During the inventory period, 
						the mall stops accepting advance payments for reservations/receipts.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">5. For further details, please refer to the Business Guidelines in the front page of the mall, 
						Understanding Terion Shop.
						</span>
					</p>
					<br data-v-1dce78d0="">
					<h3 data-v-1dce78d0="" class="text-xs-center">Chapter 2 Reveals the business model of Terion Shop</h3>
					<br data-v-1dce78d0="">
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">Booking/repurchase orders, the business model for clearing balance shipments, uncertainties such as 
						potential benefits and potential risks to the value of its merchandise due to real-time fluctuations in the gold and silver 
						market, and the extent to which booking/repo risk stake is understood for customer booking/repo risk, Risk control ability 
						and understanding of related products have high requirements. Customer selects pre-payment booking/repurchase, fully informed 
						on behalf of the customer and understand the risks of prepayments/repurchase business and agree to and accept Terion Shop current 
						and future relevant booking/repurchase business processes and management systems (collectively, the Process Systems) to develop, 
						modify and publish. This Risk Disclosure (Disclosure) is intended to fully disclose to the Client the risk of the prepayment 
						booking/repurchase business and is intended only to provide reference for the client to assess and determine its own risk 
						tolerance. The risk disclosures described in this disclosure are for example only. All risk factors associated with Terion 
						Shop Advance Booking/Repurchase are not detailed. Customers should also carefully understand and understand other possible 
						risk factors before starting or participating in Terion Shop pre-payment booking/repurchase business. If the customer is not 
						aware of or is not aware of this disclosure, they should consult Terion Shop Customer Service or the relevant regional service 
						provider in a timely manner. If the Customer ultimately clicks on Risk Disclosure, it is deemed that the Customer fully agrees 
						and accepts the full contents of this disclosure.
						</span>
					</p>
					<br data-v-1dce78d0="">
					<p data-v-1dce78d0="">Warm tips</p>
					<span data-v-1dce78d0="">1.Minors under the age of 18 are not permitted to participate in The Terion Shop Advance Booking/Recycling.</span>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">
							2.Terion Shop Advance Booking/Repo is only available to customers who meet all of the following criteria:
							<br data-v-1dce78d0="">① Natural persons with full civil capacity, legal persons of enterprises or other economic organizations registered 
							in accordance with the law.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">② To fully understand all risks associated with Terion Shop Advance Booking/Repurchase business and have a 
						certain risk tolerance.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">③ Have a certain understanding of gold and silver and its products:</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">A. Policy-related risk disclosure, such as changes in national laws, regulations and policies, contingency 
						measures, implementation of appropriate regulatory measures, Terion Shop regulatory system and changes in management methods and 
						regulations, etc., all risks that may affect customer bookings/repurchases, etc., the customer must bear the losses incurred.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">B. Price fluctuations, gold, silver and other precious metals and their accessories are affected by a variety 
						of factors, such as the international economic situation, foreign exchange, related market trends, supply and demand, and political 
						situation and energy prices. The pricing mechanism for gold, silver and other precious metals products is very complex, making it 
						difficult for customers to fully grasp in practice, so decisions such as advance booking/buyback are possible Mistakes, if the risk 
						cannot be effectively controlled, may suffer losses and the customer must bear all the losses incurred as a result.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">④ Terion Shop has enabled the provision of services through electronic communication technology and Internet 
						technology. Communication services and hardware and software services are provided by different vendors and may be at risk in terms 
						of quality and stability. Interruptions or delays due to communication or network failures may affect customer prepayment bookings/
						repurchases. In addition, the customers computer system may be attacked by viruses and/or cyber-hackers, resulting in the customers 
						advance payment booking/repurchase not being properly and/or timely.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">
							There is also a risk that the above uncertainties may affect the customer’s advance payment booking/repurchase.
							<br data-v-1dce78d0="">A. The price quoted by the Terion Shop Prepayment Booking/Repo System is based on the systems real-time trading 
							price and may differ slightly from the commodity prices in other markets.
							<br data-v-1dce78d0="">Terion Shop cannot guarantee that the above prepayment booking//repurchase price is fully consistent with other 
							markets.
							<br data-v-1dce78d0="">B. At Terion Shop;, once the customers pre-payment booking/repurchase application submitted through the online 
							terminal is completed, it cannot be withdrawn and the customer must accept the risks associated with such a subscription.
							<br data-v-1dce78d0="">C. Terion Shop prohibits regional service providers and their staff from providing any profit guarantee to 
							customers, from engaging in prepaid bookings/repurchases on behalf of customers, or from sharing profits or risks with customers. 
							Customer should be aware that any profit guarantee or commitment that Terion Shop advance booking/repurchase does not have a loss, 
							profit share or risk-sharing is impossible, unfounded, and incorrect.
							<br data-v-1dce78d0="">D. The customers pre-paid booking / repurchase application must be based on the customers own decision. 
							Terion Shop and regional service providers and employees do not provide booking / buyback to the client, nor does it constitute 
							any commitment if the client makes a booking / buyback decision accordingly.
							<br data-v-1dce78d0="">E. In advance booking / buyback process, there may be occasional apparent errors in the offer.
							<br data-v-1dce78d0="">⑤ RISK-AGREEMENT
							<br data-v-1dce78d0="">Typhoons, floods, fires, wars, disturbances, rule revisions, changes or adjustments in government regulatory 
							policies and regulatory requirements, and electricity, To ensure that you fully understand the relevant provisions and risks of booking 
							/ repurchase business, customers should be based on their own booking experience, booking / repurchase / purchase of commodities, read 
							all the contents of the advance booking / repurchase notice carefully, and fully understand and agree to all the contents, I am willing 
							to take all risks to start or participate in Terion Shop. In case of above mentioned condition I shall be him-self liable to any financial 
							as well as monitory loss. By accepting this I shall be no more eligible to claims any statutory legal benefits given to Indian citizen by 
							Law of India.
							<br data-v-1dce78d0="">
							<br data-v-1dce78d0="">
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">Note: I have carefully read all contents of this app including Privacy Statement, Risk Disclosure Agreement 
						and Risk Agreement and I am agreed to continue with my own risk.
						</span>
					</p>
					<br data-v-1dce78d0="">
					<h3 data-v-1dce78d0="" class="text-xs-center" style="margin-bottom: 12px;">Cancellation and refundable Policy</h3>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">In case of any discrepancy we can cancel any of the orders placed by you. A few reasons for cancellation 
						from our end usually include limitation of the product in the inventory, error in pricing, error in product information etc. We 
						also have the right to check out for extra information for the purpose of accepting orders in a few cases. We make sure to notify
						you if in case your order is cancelled partially or completely or if in case any extra data is required for the purpose of 
						accepting your order.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">Once you place the order, such order can be cancelled from your end before the shipping is undertaken to 
						the destination. Once the request of cancellation for ready for shipping product is received by us, we make sure to refund the 
						amount through the same mode of payment within 5 working days. Cancellation of the order of Gold coin(exchanged by integrals) 
						shall not be accepted as under Company’s policies.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">We don’t accept Cancellation requests for Smart Buy orders or customized jewellery orders. In specific 
						situations when the customer wants the money back or wants to exchange it with other products, making charges of the product and 
						stone charges, if there is any stone on the product shall be deducted from the payment and balance will be refunded back to 
						customer account within 5 working days.
						</span>
					</p>
					<p data-v-1dce78d0="">
						<span data-v-1dce78d0="">If in case the amount is deducted from your account and the transaction has failed, the same will be 
						refunded back to your account within 72 hours.
						</span>
					</p>
				</div>
			</div>
		</div>
		<?php include("include/footer.php");?>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
	</body>
</html>