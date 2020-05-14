<?php
session_start();
if (isset($_SESSION['login_resp']['id']) && !empty($_SESSION['login_resp']['id'])) {
    echo '<script type="text/javascript">window.location.href = "dashboard";</script>';
    exit;
}
include_once 'common_html.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Obedient</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
</head>

<body>
    <div id="loader_bg">
        <div class="flip-square-loader mx-auto" id="loader_div"></div>
    </div>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>New here?</h4>
                        <h6 class="font-weight-light mb-4">Join us today! It takes only few steps</h6>
                        <div id="register_error"></div>
                        <form id="example-form" class="register_form" action="#" enctype="multipart/form-data">
                            <div>
                                <h3>Personal Details</h3>
                                <section>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Introducer Code <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control required" placeholder="" name="sponsor" id="sponsor" onblur="get_sponser_detail()">
                                            <span id="sponsor_detail"></span>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Position <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control required" id="position" name="position">
                                                <option value="">-- Select One --</option>
                                                <option value="Auto">Auto</option>
                                                <option value="Left">Left</option>
                                                <option value="Right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control required" placeholder="" name="name" id="name" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Applicant Photo <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="file" name="img[]" class="file-upload-default" name="photo" id="photo">
                                            <div class="input-group">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">House No<span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="house_no" id="house_no">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Block <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="block" id="block">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sector<span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="sector" id="sector">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Street No<span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="street_no" id="street_no">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Village Colony<span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="village_colony" id="village_colony">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Post Office/Sub City<span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" name="post_office_or_sub_city" id="post_office_or_sub_city">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">State <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control states" id="states" name="states"> </select>
                                        </div>
                                        <label class="col-sm-2 col-form-label">District <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control " id="city" name="city"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="pin_code" name="pin_code" onkeypress="return isNumberKey(event);">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Father Name <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="father_name" name="father_name" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Mother Name <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="mother_name" name="mother_name" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gender <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">-- Select One --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date datepicker">
                                                <input type="text" class="form-control required" placeholder="Enter date of birth" id="dob" name="dob" readonly />
                                                <span class="input-group-addon input-group-append border-left">
                                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mobile 1<span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control required" placeholder="" id="mobile" name="mobile" onkeypress="return isNumberKey(event);" />
                                        </div>
                                        <label class="col-sm-2 col-form-label">Mobile 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="land_line_phone" name="land_line_phone" onkeypress="return isNumberKey(event);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Marital Status <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="">-Select Marital Status-</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Occupation <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="occupation" name="occupation" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Aadhar Number <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control required" placeholder="" id="adhar" name="adhar" onkeypress="return isNumberKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Email ID <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <span id="emailid-error" class="error" style="display:none">Enter valid email-id.</span>
                                            <input type="text" class="form-control required" placeholder="" id="email_id" name="email_id" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control required" placeholder="" id="password" name="password">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control required" placeholder="" id="confirm_passowrd" name="confirm_passowrd">
                                        </div>
                                    </div>
                                </section>
                                <h3>Bank Details</h3>
                                <section>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payee Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="payee_name" name="payee_name" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Bank Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="bank_name" name="bank_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Account Number</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="account_number" name="account_number" onkeypress="return isNumberKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Branch</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="branch" name="branch">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">IFSC Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="ifsc_code" name="ifsc_code">
                                        </div>
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cancel Cheque</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="file" name="img[]" class="file-upload-default" name="cancel_cheque" id="cancel_cheque">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                                </span>
                                            </div>
                                            <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                <a href="#" class="image-tile" id="a_cancel_cheque_uploded">
                                                    <img src="" id="cancel_cheque_uploded" class="img-lg mb-3" style="display:none;" alt="small image" />
                                                </a>
                                            </div>

                                            <!--<input type="file" class="form-control" placeholder="" name="cancel_cheque" id="cancel_cheque">-->
                                        </div>
                                    </div>
                                </section>
                                <h3>Nominee Details</h3>
                                <section>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nominee Name <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="nominee_name" name="nominee_name" onkeypress="return isAlphabetKey(event);">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Relation <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="relation" name="relation"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date datepicker">
                                                <input type="text" class="form-control" placeholder="Enter date of birth" id="nominee_dob" name="nominee_dob" readonly />
                                                <span class="input-group-addon input-group-append border-left">
                                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Age <span class="text-danger"></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="" id="nominee_age" name="nominee_age">
                                        </div>
                                    </div>
                                </section>
                                <h3>Terms & Conditions</h3>
                                <section>
                                    <div class="terms_condition">
                                        MI LIFESTYLE MARKETING GLOBAL PRIVATE LIMITED, a company incorporated under the Companies Act, 1956 and having its Registered Office in Chennai, hereinafter referred to as "the Companyâ€œ or â€œMi Lifestyleï¿½? or â€œweï¿½? which ever is appropriate. The Company
                                        is inter-alia into the business of Direct Selling of various products such as White Goods, Consumer Durables, Cosmetics, FMCG, Health Products, etc., The Company exclusively uses website to display the details of
                                        the products, marketing methods, business monitoring, while uses the word of mouth publicity to promote and create awareness about the company and its products.<br><br> The
                                        Company does appoint freelance Independent Distributors across the country for marketing and sale of products. Interested individuals/body corporates can order the products upon they being satisfied with the quality
                                        and services they can become a freelance Independent Distributor (herein after may be referred as â€œDistributorï¿½?) of the company, if they wish to by applying for the same in the prescribed form and thereby accepting
                                        the Terms and Conditions mentioned. Mi Lifestyle doesnâ€™t collect any Registration Charges and are absolutely FREE AND EASY to get enrolled as Customer/Registered Distributor.<br><br> Before filling the application
                                        form, the intending Distributor is advised to go through the terms and conditions mentioned herein below thoroughly along with those mentioned in the official website of the company during placing an online order
                                        and subject to such terms and conditions shall append their signature by way of marking tick in the column provided as a token of their acceptance of the terms and conditions mentioned therein.<br><br> I. Definitions<br><br> The following words used in these presents shall have the meaning as defined hereunder;<br>a. Company â€“ Means Mi Lifestyle Marketing Global Private Limited.
                                        <br> b. Consumer â€“ Consumer means and includes individuals/body corporate (including Partnership Firms) who purchases products from the Company.<br> c. Independent Distributor - Independent Distributor is the individual
                                        person/body corporate (including Company/Partner Ship firm, proprietary concern) who is competent to enter into contract as per the Indian Contract Act provided, such interested person has purchased products from
                                        the Company and opted to Participate in Business opportunity.<br> d. He - Shall mean and include male, female, and body corporate, partnership firm who applies for the Distributorship of the Company.<br> e. Product
                                        - Shall mean and include all the products marketed by the Company from time to time.<br> f. Manufacturer - Means and include Manufacturers of the products marketed and sold by the Company from time to time.<br> g. MRP - Means and includes Maximum Retail Price printed over the price tag appended to the products.<br> h. Facilitation Fee - Facilitation Fee is the amount/income an Independent Distributor may earn by marketing/referring
                                        the products of the Company.<br> j. Unique ID - Means unique identification number issued by the Company to the Consumer/Independent Distributor and is issued to Independent Distributor as a token of acceptance
                                        of his application seeking for distributorship for the products of the Company.<br> k. Password - Password means, unique code allotted to each of the Consumer/Independent Distributor to allow them to log on to the
                                        website of the Company.<br> I. Website Means website of the Company www.milifestylemarketing.com, www.indiashoppe.com or any official website (including through mode of mobile app) communicated through official
                                        communication channels of the company. Mi Lifestyle has developed business brands within itself, each of which is a separate business identity in itself - MI LIFESTYLE â€“ Direct Selling Business Opportunity (www.milifestylemarketing.com)
                                        INDIA SHOPPE â€“ Product Development, Retailing and Distribution (www.indiashoppe.com) II. THE APPOINTMENT AND UNDERSTANDING a. The Company upon scrutiny and verification of the Application may consider the Applicant
                                        as an "Independent Distributorï¿½? for the products marketed by the Company. Independent Distributor shall enjoy the following privileges after such recognition. i. No territorial restriction to market the products,
                                        but limited to India. ii. Company shall maintain sales account of the Independent Distributor and shall be made available for viewing through their website. iii. An Unique ID and password shall be awarded to facilitate
                                        viewing of their respective business account. iv. There shall be no specific targets; however earnings shall be in proportion to the volume of sales done by the Independent Distributor by self or through team as
                                        stipulated. v. Distributorship may be awarded as a privileged consumer with no deposit, but subject to accepting terms and other conditions. vi. Distributorship is awarded without any commitment/or promise from
                                        the company in terms of possible earning potentials. b. The Independent Distributor, upon appending his signature by way of marking tick wherever asking to read the Terms and Conditions and to confirm and upon confirming
                                        through online in the companyâ€™s official website, shall be deemed to have accepted the Distributorship as independent distributor and hereby covenants as under; i. That he has clearly understood the Business Opportunity,
                                        marketing program, the compensation plan, its limitations and conditions and, he is not relying upon any representation or promises that is not set out in this term and conditions or other officially printed or
                                        published materials of the company. ii. Shall act as an independent body and shall not commit any misfeasance or malfeasance to create any liability/obligation over the company of whatsoever nature. iii. An Independent
                                        Distributor is not an Agent/Employee or any other Legal representative of the company or its service providers. iv. He has attained the age of majority and is competent to enter into a contract as provided in the
                                        "INDIAN CONTRACT ACT". Necessary proof thereof shall be submitted as and when required by the Company. v. Independent Distributor hereby undertake not to accept cash from any new consumer introduced by him for buying
                                        the products and discourage his team members from accepting cash from any buyers or from other Distributors. III. GENERAL TERMS I. The company under no circumstances will accept payment in cash for product Sales.
                                        II. The company may appoint any Third Party for Collection/distribution services. Independent Distributor is required to visit the company's official website from time to time to know such an appointment and avail
                                        facilities such as walk in to their outlets and make Payment and collect a valid receipt and products from them. III. The Products can be ordered online through our website and the payment in the form of demand
                                        draft favouring "MI LIFESTYLE MARKETING GLOBAL PRIVATE LIMITED", Payable at CHENNAI, has to be sent / submitted at our authorized outlets, against which the product/s ordered will be delivered to the purchaser/authorized
                                        person. If the payment has been done through Credit Card/Debit Card using payment gateway process or through Terminal Swiping machine, the same or the front side photo copy of the â€˜same has to be presented with
                                        the ID proof, at the time of product delivery, by the purchaser either while collecting the product from the delivery outlet or while product getting delivered at the purchaserâ€™s delivery address. The Product can
                                        also be purchased through E-Wallet. iv. All consumers/Independent Distributors before ordering online or making the payment are advised to physically look and feel the products that are available for demo/display
                                        at our locations, as such the images shown in the companyâ€™s website / printed materials or through, any other mode by the company is only for reference and the actual product may vary. v. Neither it is compulsory
                                        nor mandatory to participate in the business plan of MI LIFESTYLE and Purchasers who wish not to join the business can opt to do so by checking the "Free & Optional Business option' box during registration process.
                                        You will however, need to provide the direct / enroller details (without which products can't be purchased as such Company take every possible steps to make the purchaser understand about the company, products,
                                        policies, etc., and also to make ensure that the purchaser is properly guided to buy MI LIFESTYLE products or before entering in to MI LIFESTYLE Business Opportunity) and such purchaser will be termed as "Consumer".
                                        vi. Independent distributors may refer new customers through â€˜Customer Registration Processâ€™. However, these customers will not exist in the Business Opportunity system (genealogy/distributor) network. The customers
                                        will buy products of their choice at the given MRP Price; respective BVs will be accounted as self-BVs of their introducing distributor. The consumer is not entitled for any Facilitation Income or monetary benefits
                                        from the company, but they will have all rights as a consumer and privileges being a registered consumer. vii. A consumer who has purchased the products from MI LIFESTYLE, can choose to join the business opportunity
                                        free of cost, which he can do so by confirming from his Business centre login (where in access will be provided for 30 days, within which they need to confirm and beyond that he/she needs to contact the companyâ€™s
                                        customer care department with all his/her purchase information to re-activate his business centre, so as to understand whether the consumer has got the required information about the company, before entering in
                                        to a Business Opportunity). viii. The Independent Distributor will be eligible towards facilitation fees or income, as per the volume of sale of products/ business done by him, subject to the eligibility norms formulated
                                        by the company from time to time. The company does not guarantee/assure any facilitation fees or income to the distributor on account of becoming just a mere "distributor" of the Company. ix. Unique ID has to be
                                        quoted by the distributor in all his transactions and correspondence with the company. The Unique ID once chosen cannot be altered at any point of time. x. No communication will be entertained without unique ID
                                        and basic information, if he is contacting company other than logging in online. Distributor shall preserve the ID properly as it is before logging on to website. xi. TDS and any other applicable charges will be
                                        deducted by the Company as per the prevailing norms at the time of making payment. xii. Those Distributors who are not achieving their minimum monthly purchase obligation for last 12 month, the said Distributorship
                                        will be Terminated/blocked. xiii. Independent Distributor Undertake to adhere to policies, procedures, rules & regulations formed by the company. xiv. The distributor shall be faithful to the company and its co-distributors
                                        and shall uphold the integrity and decorum of the company and shall maintain good relations with other distributors and other clients. The Distributor understands that, the company shall be at liberty to accept
                                        or reject his application to become a distributor. xv. The Company reserves its right to modify the terms and condition, products, plans, business and policies with/without giving prior notice. Such notice may be
                                        published through the official website of the company, and any such modification/amendment shall be applicable and binding upon the Distributor from the date of such publication. xvi. The Company does not collect
                                        any membership charges or Registration Fees. IV. PRICES / PAYMENT a. The Updated Products and their Price lists are available on the company's official website and the amount to be paid (only after complete satisfaction
                                        with the description/ features available on the website and if possible, the physical verification of the product can be had by the purchaser by visiting our authorized outlets) by way of Bank Demand Draft favoring
                                        "MI LIFESTYLE MARKETING GLOBAL PRIVATE LIMITEDï¿½? payable at â€œCHENNAIï¿½? or through online payment gateway or swiping machine option or E-Wallet while placing the order. b. It is mutually agreed between the parties
                                        that the Consumer/Independent Distributor if satisfied about the product package ensure that the amount towards such product should reach the company's branch/authorized outlets within 30 days from the date of ordering
                                        the same online. In case the Product Purchaser fails to make payment within the aforesaid 30 days period to the company, it is up to the company's discretion either to accept the payment on the norms prevailing
                                        at that point of time or that this Agreement stands terminated and will be deemed as null and void. c. It is mutually agreed between the parties hereto, that the company is at liberty to change / modify the quantum
                                        of product cost payable under this Agreement in future or provide for additional Product / Services at such additional cost as may be determined by the company. d. The company offers 30 days money back guarantee,
                                        from the date of receipt of payment, in case of unsatisfied with the product, provided its in unused condition and as per Returns Policy. e. The product rates and specification is also subject to change and may
                                        vary from time to time. f. The company will not be responsible for any loss or damages if caused due to any technical error in the web links provided in the website, payment gateway, typographical errors etc. V.
                                        PROHIBITIONS i. Distributor is prohibited from listing, marketing, advertising, promoting, discussing, or selling any product, or the business opportunity on any website or online forum that offers like auction
                                        as a mode of selling. Please refer to code of conduct of our Distributor Policies and Procedures for complete details. ii. Once a distributorship is terminated, he cannot enter into any of the company premises/meeting
                                        locations and his facilitation fee/ his name would be removed and he would not be entitled to receiving any fees going forward immediately. iii. The distributor hereby undertakes not to compel or induce or mislead
                                        any person with any false statement/promise to purchase products from the company or to become distributor of the company. VI. DUTY AND CONFIDENTIALITY Parties shall maintain confidentiality with respect to companyâ€™s
                                        information including but not limited to companyâ€™s policies, product details, facilitation fees etc., save and except to the extent that is required for furthering sale of products; VII. SPECIAL CONDITIONS Notwithstanding
                                        anything stated or provided herein, the company reserves its right to modify, alter or vary the terms and condition in any manner whatsoever they think fit and shall be communicated through official website or other
                                        mode as the company may deem fit and proper. Differences if any on such amendment shall be expressed/intimated in writing to the company within 7 days from the date of such amendment. In the absence of receipt of
                                        written objection, if any within such stipulated period, all such amendments to the agreement shall be considered as carried with the consent and thereafter any objection/difference shall be considered as waived/surrendered
                                        unconditionally. VIII.TERMINATION The Company reserves its rights to terminate the Distributorship for any reason not limited to the breach of terms as stipulated herein. IX. FORCE MAJEURE The Company shall not
                                        be liable for any failure to perform its obligations where such failure has resulted due to Acts of Nature (including fire, flood, earthquake, storm, hurricane or other natural disaster), war, invasion, act of foreign
                                        enemies, hostilities (whether war is declared or not), civil war, rebellion, revolution, insurrection, military or usurped power or confiscation, terrorist activities, nationalization, government sanction, blockage,
                                        embargo, labour dispute, strike, lockout or interruption or failure of electricity. X. RECOURSE AND LEGAL APPLICABILITY i. The terms and conditions stipulated in the forgoing paragraphs shall be governed in accordance
                                        with the laws in force in India. Disputes, if any, shall be subject to the exclusive jurisdiction of the courts in Chennai. ii. If any dispute or difference arising out of or in relation to these presents, the same
                                        shall be referred to a sole arbitrator appointed by the Company. Arbitration in such event shall be conducted as per the "Arbitration and conciliation Act, 1996"as amended from time to time. Venue of such Arbitration
                                        shall be Chennai_and Language shall be English. Declaration/Affirmation Solemnly affirm and declare as follows: 1. That I have read and understood the terms and conditions for â€˜Independent Distributorship " of the
                                        Company. 2. I have also gone through the company official website, printed materials, brochures and convinced about the business and I have applied for the Distributorship on my own volition. 3. I declare that I
                                        have not been given any assurance or promise by the company or by its distributors as to any income on account of the product purchase made by me. However I am made to understand that I will be eligible for income/facilitation
                                        fees depending upon the volume of business done by me, as per terms and the Company reserves the right to change the Business Plan at any point of time. 4. I undertake not to misguide or induce any one I shall not
                                        misguide anyone and appraise them the terms and conditions for any one to become a distributor to join the company. 5. I hereby agree and adhere to the terms and conditions as stipulated along with the application
                                        form and as mentioned above to agree to purchase the product as Consumer/to do the distributorship business. 6. I hereby agree to submit all disputes to arbitration as provided in the terms and conditions of the
                                        company.
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" id="18years" disabled> Yes I am 18 years and above </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" id="privacy" disabled> I have read and understood the terms and privacy policy of site</label>
                                    </div>
                                    <div id="errors_div"></div>
                                </section>
                            </div>
                        </form>
                        <div class="text-right mt-4 font-weight-light mr-2"> Already have an account? <a href="login" class="text-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/jquery-steps/jquery.steps.min.js"></script>
    <script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <script src="assets/vendors/sweetalert/sweetalert.min.js "></script>
    <script src="assets/js/alerts.js "></script>

    <!-- Custom js for this page -->
    <script src="assets/js/wizard.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
    <!--script for jquery validation-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>


    <!-- Jquery JS-->

</body>

</html>
<script type="text/javascript">
    var front_url = "<?php echo $home_url; ?>";
    var base_url = "<?php echo $base_url; ?>";
    var state_list;
    var today = new Date();
    var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
    $(document).ready(function() {
        getStatesCities();
        getRelationships();
        $(":input").inputmask();
        //checkCookie();

        if ($(".datepicker").length) {
            $('.datepicker').datepicker({
                enableOnReadonly: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
                autoclose: true,
                endDate: todays_date
            });
        }

        $('#name').blur(function() {
            $('#payee_name').val($(this).val());
        });
        $('#dob').change(function() {
                $(this).valid(); // triggers the validation test        
        });

        $(document).on('change', '#nominee_dob', function() {
            var value = $(this).val();
            var today = new Date(),
                dob = new Date(value),
                age = new Date(today - dob).getFullYear() - 1970;
            $('#nominee_age').val(age);
            $('#nominee_age').prop('readOnly', true);
        });

        //email validation on blur
        $('#email_id').blur(function() {
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (testEmail.test(this.value) == false) {
                $('#emailid-error').css('display', 'block');
                $('#emailid-error').css({
                    "color": "#fe7c96",
                    "display": "inline-block",
                    "margin-left": "1.5em",
                    "font-size": "0.875rem"
                });
            } else {
                $('#emailid-error').css('display', 'none');
            }
        });

    }); //document

    //function for checkcookies
    function checkCookie() {

        var UserCookie = getCookie("UserCookie");
        if (UserCookie != "") {
            var data = JSON.parse(UserCookie);
            //alert("Welcome again " + data.name);
            window.location.href = "dashboard";
        } else {
            getStatesCities();
            getRelationships();
        }
    } //end function checkcookies

    //function for get cookies
    function getCookie(cname) {

        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    } //end function getCookie
    //function for getCities
    $(".states").change(function() {
        var state_id = $(this).val();
        var city_div = '<option value="">-- Select City--</option>';
        var cities = state_list[state_id].cities;
        $.each(cities, function(key, value) {
            city_div += '<option value="' + value.id + '">' + value.city + '</option>';
        });
        $("#city").html(city_div);
    });

    $("body").on("click", ".actions a[href$='#finish']", function(e) {
        e.preventDefault();
        if ($('#18years').is(':checked') == false) {
            $('#18years').focus();
            showSwal('error', '18 Years Confirm', 'Please confirm you are 18 years or above');
            return false;
        }
        if ($('#privacy').is(':checked') == false) {
            $('#privacy').focus();
            showSwal('error', 'Accept Privacy', 'Please accept the terms and condition.');
            return false;
        }
        showLoader();
        var params = new FormData();
        var introducer_code = $('#sponsor').val();
        var orientation = $('#position').val();
        var photo = '';
        if($('#photo').val())
        {
            photo = $('#photo')[0].files[0]; 
        }
        var associate_name = $('#name').val();
        //var address = $('#address').val();
        var house_no = $('#house_no').val();
        var block = $('#block').val();
        var sector = $('#sector').val();
        var street_no = $('#street_no').val();
        var village_colony = $('#village_colony').val();
        var post_office_or_sub_city = $('#post_office_or_sub_city').val();
        var father_or_husband_name = $('#father_name').val();
        var mothers_name = $('#mother_name').val();
        var gender = $('#gender').val();
        var dob = $('#dob').val();
        var mobile_no = $('#mobile').val();
        var land_line_phone = $('#land_line_phone').val();
        var marital_status = $('#marital_status').val();
        var occupation = $('#occupation').val();
        var state = $('#states').val();
        var city = $('#city').val();
        var pin_code = $('#pin_code').val();
        var adhar = $('#adhar').val();
        var email = $('#email_id').val();
        //username:$('#username').val(),
        var password = $('#password').val();
        var confirm_password = $('#confirm_passowrd').val();
        //bank details 
        var payee_name = $('#payee_name').val();
        var bank_name = $('#bank_name').val();
        var account_number = $('#account_number').val();
        var branch = $('#branch').val();
        var ifsc_code = $('#ifsc_code').val();
        var cancel_cheque = '';
        if($('#cancel_cheque').val())
        {
            cancel_cheque = $('#cancel_cheque')[0].files[0];
        }
       
        //nominee details
        var nominee_name = $('#nominee_name').val();
        var relation = $('#relation').val();
        var ndob = $('#nominee_dob').val();
        //var father_husband_name = $('#nominee_father_name').val();
        //var mothers_name = $('#nominee_mother_name').val();
        var nominee_age = $('#nominee_age').val();


        params.append("introducer_code", introducer_code);
        params.append("orientation", orientation);
        //params.append("signature", signature);
        params.append("photo", photo);
        params.append("associate_name", associate_name);
        //params.append("address", address);
        params.append("house_no", house_no);
        params.append("block", block);
        params.append("sector", sector);
        params.append("street_no", street_no);
        params.append("village_colony", village_colony);
        params.append("post_office_or_sub_city", post_office_or_sub_city);
        params.append("father_or_husband_name", father_or_husband_name);
        params.append("mothers_name", mothers_name);
        params.append("gender", gender);
        params.append("dob", dob);
        params.append("mobile_no", mobile_no);
        params.append("land_line_phone", land_line_phone);
        params.append("marital_status", marital_status);
        params.append("occupation", occupation);
        params.append("state", state);
        params.append("city", city);
        params.append("pin_code", pin_code);
        params.append("adhar", adhar);
        params.append("email", email);
        params.append("password", password);
        params.append("confirm_password", confirm_password);
        params.append("payee_name", payee_name);
        params.append("bank_name", bank_name);
        params.append("account_number", account_number);
        params.append("branch", branch);
        params.append("ifsc_code", ifsc_code);
        params.append("cancel_cheque", cancel_cheque);
        params.append("nominee_name", nominee_name);
        //params.append("father_or_husband_name", father_husband_name);
        //params.append("mothers_name", mothers_name);
        params.append("nominee_age", nominee_age);
        params.append("relation", relation);
        params.append("ndob", ndob);

        var url = base_url + 'register';
        $.ajax({
            url: url,
            type: 'post',
            //dataType: 'json',
            data: params,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    var name = response.info.name;
                    var username = response.info.username;
                    window.location.href = front_url + 'thank-you.php?name=' + name + '&username=' + username;
                    // window.location.href = 'http://localhost/obedientcorp-frontend/thank-you.php?name='+name+'&username='+username;
                } else {
                    window.location.href = "failure";
                    hideLoader();
                }

            },
            error: function(response) {
                console.log(response);
                error_html = '';
                var error_object = JSON.parse(response.responseText);
                var message = error_object.message;
                var errors = error_object.errors;


                $.each(errors, function(key, value) {
                    error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                });
                $('#errors_div').html(error_html);
                hideLoader();
            }
        }); //ajax
        //}//end if


    }); //click button

    //get states ans cities onlaod page
    function getStatesCities() {
        var url = base_url + 'state-city-list';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            //data: params,
            success: function(response) {
                if (response.status == "success") {
                    state_list = response.data.list;
                    var states = '<option value="">-- Select State--</option>';
                    if (response.data.username != '') {
                        $("#username").val(response.data.username);
                    }
                    $.each(state_list, function(key, value) {
                        states += '<option value="' + value.state.id + '">' + value.state.state + '</option>';
                    });
                    $("#states").html(states);
                }

            }
        }); //ajax
    } //end function for get states and cities


    function getRelationships() {
        var url = base_url + 'relationships';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            //data: params,
            success: function(response) {
                if (response.status == "success") {
                    var relation = '<option value="">--Select One Relation--</option>';
                    $.each(response.data, function(key, value) {
                        relation += '<option value="' + value.name + '">' + value.name + '</option>';
                    });
                    $("#relation").html(relation);
                }

            }
        });
    }


    //function for get sponsor details
    function get_sponser_detail() {
        var introducer_code = $('#sponsor').val();
        if (introducer_code != '') {
            var url = base_url + 'introducer-info';
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    introducer_code: introducer_code
                },
                success: function(response) {
                    if (response.status == "success") {
                        $('#sponsor_detail').html(response.data.display_name);
                    } else {
                        $('#register_error').css('display', 'block');
                        $('#register_error').html(response.data);

                    }

                }
            }); //ajax
        } //if
        else {
            $('#register_error').css('display', 'none');
        }


    } //close function get_sponser_detail
    $(".terms_condition").scroll(function() {
        var y = $('.terms_condition').scrollTop();
        if (y > 1400) {
            $('#18years,#privacy').removeAttr('disabled')
        }
    });

    function showLoader() {
        $('#loader_bg').css('display', 'block');
    }

    function hideLoader() {
        $('#loader_bg').css('display', 'none');
    }

    hideLoader();

    function isNumberKey(evt) {
        //var charCode = (evt.which) ? evt.which : evt.keyCode;
        var e = window.event || evt;
        var charCode = e.charCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function isAlphabetKey(e) {
        isIE = document.all ? 1 : 0
        keyEntry = !isIE ? e.which : event.keyCode;
        if (((keyEntry >= '65') && (keyEntry <= '90')) || ((keyEntry >= '97') && (keyEntry <= '122')) || (keyEntry == '46') || (keyEntry == '32') || keyEntry == '45')
            return true;
        else
            return false;
    }
</script>