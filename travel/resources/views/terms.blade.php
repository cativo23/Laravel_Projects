@extends('layouts.app',['message'=>$message ?? ''])

@section('section', 'Terms & Conditions')

@section('content')
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>TERMS & CONDITIONS</h1>
            </div>
        </div>
    </section>

    <div class="container margin_60_35" style="transform: none;">
        <div class="row" style="transform: none;">
            <!--/aside -->

            <div class="col-lg-9" id="faq">
                <h4 class="nomargin_top">Terms and Conditions of Website Use</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>Reservations Policies</a>
                            </h5>
                        </div>

                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>www.BestDay.com (Bookings Partner of Trip Xpertz) Under this agreement, the payment processing services for goods and/or services purchased on this website are provided by Best Day Europe Ltd. on behalf of Viajes Beda, S.A. de C.V. or by Traveler''s Holding Inc., depending on the type of payment method used for the purchase of the goods and/or services. In the event you choose to pay with credit card and the payment will be processed via a European Acquirer, these terms are an agreement between you and Best Day Europe Ltd. For any other type of purchases, these terms are an agreement between you and Viajes Beda, S.A. de C.V. and goods and/or services will be delivered by Viajes Beda, S.A. de C.V. directly.
                                    Rates listed are exclusively valid for the inquiry date. They are subject to change and will only be honored as shown on the website if the service requested is confirmed by means of charge to your credit card and you receive a confirmation number.
                                    Upon making a reservation it becomes necessary for you to give your authorization, written and/or verbal, to run the corresponding charge on your credit card and by this you declare to have full knowledge of our Reservation and Payment Policies, Disclaimer and Cancellation Policies. All reservations are subject to availability existing at the moment of your request. No confirmation can be issued until full payment for the requested service has been made. In some cases (which are duly marked for you to easily identify them before filling out contact information and credit card number fields) it will be necessary to check availability directly with the service operator before a confirmation can be issued to you. Please note that this verification and confirmation process may take up to, and never more than, 24 hours.
                                    In order to avoid inconveniences, please make a printout of your reservation voucher and have it ready for check-in to the reserved service. Should a change to a confirmed reservation be needed, please contact your assigned Travel Consultant and have your reservation and/or confirmation number handy. We strongly suggest reading the CANCELLATION POLICIES section hereinafter. Any changes are subject to availability and rate adjustments when necessary. Our CANCELLATION POLICIES are applicable at all times without exception.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Payment Policies
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>The amount corresponding to your reservation will be immediately charged to your credit card, provided it has a confirmed reservation status. Please bear in mind that your credit card billing statement will show "TRAVEL RESERVATION CENTER" as the company responsible for the charge, except for some reservations including flights where you might have two charges, one for the airfare amount and another for the remaining amount of all other services such as your hotel, airport shuttle or activity reservation, taxes, fees, and other. These charges may appear as “TRAVEL RESERVATION CENTER” and the corresponding “AIRLINE COMPANY NAME”.
                                    VISA, MASTERCARD and AMERICAN EXPRESS are welcome. We will be glad to accept your wire transfer as an alternative form of payment. Please contact one of our Travel Consultants for further details.
                                    The currency in which service rates are quoted on the website may be other than Mexican pesos or US dollars, in which case the specific currency will be readily specified for your easy identification. Mexican pesos rates will always be charged in Mexican pesos. For any other currency, however, the amount to charge will be first converted into US Dollars and the exchange rate prevailing on the transaction date will be applied. This movement may cause a variation of up to 3% above the international fluctuation index for currency exchange and such difference will show on your billing statement. www.BestDay.com (Bookings Partner of Trip Xpertz) cannot be held responsible for this variation and upon accepting the PAYMENT POLICIES you acknowledge to have been informed of the exchange rate fluctuation and declare your agreement to the corresponding charge being made into US Dollars.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseThree_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Disclaimer
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>www.BestDay.com (Bookings Partner of Trip Xpertz) works as a middle-agent between the client and the operator of services listed on the website. As such, www.BestDay.com (Bookings Partner of Trip Xpertz) creates the necessary commercial connections in compliance with its own service and quality standards to provide services such as, but not limited to, hotel accommodations, ground transportation and other travel activities. Only the most reputable suppliers are selected for this purpose. However www.BestDay.com (Bookings Partner of Trip Xpertz) cannot be held liable for their acts, omission, wrongdoing or other. Travel services are subject to the conditions set by those suppliers, and their liability may, in turn, be limited by their tariffs and conditions of service. www.BestDay.com (Bookings Partner of Trip Xpertz) acts only in its role of agent for the client or for the supplier of the goods and services rendered and as such, does not keep any legal authority or control over the operator’s Personnel, assets, operation and/or property.
                                    www.BestDay.com (Bookings Partner of Trip Xpertz) herewith declares that,
                                    (a) Photographic material published on its website is intended to render a general depiction of the service in question and by no means can be guaranteed that the service will be supplied exactly as depicted.
                                    (b) Star ratings assigned to hotel accommodations and services are based on www.BestDay.com (Bookings Partner of Trip Xpertz)’s own standards and quality criteria and may not necessarily match rating criteria used elsewhere.
                                    (c) Travel services descriptions are regularly updated for a depiction of the product as close to reality as possible. However, www.BestDay.com (Bookings Partner of Trip Xpertz) cannot be held accountable for variations occurring upon your arrival at the Travel Service site.
                                    (d) www.BestDay.com (Bookings Partner of Trip Xpertz) will reserve the right to deny the supply of a service to any client at any given moment if and when it considers convenient to do so.
                                    (e) Any claim or comments that the client should present about the services received must be submitted in writing within a period of time no longer than 14 (fourteen) days from travel’s end date.

                                    www.BestDay.com (Bookings Partner of Trip Xpertz) will not assume liability for any claims, costs or expenses arising from personal injuries to the client or third parties, or caused by accidents, fatalities, loss or damage to personal property, lack of enjoyment or claims over emotional and mental states such as upset, disappointment, anguish, distress or frustration, or any other damage, whether physical, mental or emotional, arising from the following:
                                    (a) Acts committed or omissions caused by any party other than www.BestDay.com (Bookings Partner of Trip Xpertz) or its employees.
                                    (b) Illness, theft, labor disputes, mechanical failures, quarantine, Government actions, weather or any other circumstance beyond direct control of www.BestDay.com (Bookings Partner of Trip Xpertz).
                                    (c) The client’s failure to obtain the required travel documentation such as, but not limited to, passport, visas and certificates, in which case no refund will be granted.
                                    (d) The client’s failure to comply with travel instructions such as, but not limited to, flight schedules, hotel check-in and check-out dates and times, and voucher redemption policies.
                                    (e) Changes to, or cancellation of, the travel services offered, notwithstanding the reason. www.BestDay.com (Bookings Partner of Trip Xpertz) reserves the right to cancel or change the travel services at its discretion, but will try to substitute them with comparable services. If a reservation must completely be canceled, www.BestDay.com (Bookings Partner of Trip Xpertz)’s liability will be limited to a refund of all monies paid to www.BestDay.com (Bookings Partner of Trip Xpertz).
                                    (f) A full refund will not be granted by www.BestDay.com (Bookings Partner of Trip Xpertz) in situations when a service must be interrupted, postponed or cancelled for reasons beyond its control (acts of God such as bad weather -including hurricanes- , earthquakes or war, acts of terrorism or else), circumstances under which www.BestDay.com (Bookings Partner of Trip Xpertz) is not allowed to obtain full refund from service operators in view of specific contract terms. In order to cover book-keeping and administration services, www.BestDay.com (Bookings Partner of Trip Xpertz) will be thus entitled to up to a 10% retention upon the total amount paid by the client for his/her reservation.
                                    Despite our close communication with our selected group of service suppliers, there is still a possibility that changes on the rates may occur without notice. As some of the rates become expired and cannot be timely updated by the operator to your immediate convenience, www.BestDay.com (Bookings Partner of Trip Xpertz) regularly runs a rates verification process which may yield differences between the price you have paid for your reservation and the price you need to pay to actually enjoy the service. When an updated rate happens to be lower than the originally offered to you, www.BestDay.com (Bookings Partner of Trip Xpertz) will only charge the lower amount. When an updated price is higher than the originally quoted price, www.BestDay.com (Bookings Partner of Trip Xpertz) will have a Travel Consultant inform you of the specific variation and the resulting balance that needs to be covered. Should you not agree to the correct amount and decide to cancel upon the circumstances, www.BestDay.com (Bookings Partner of Trip Xpertz) will honor you cancellation request without penalization. www.BestDay.com (Bookings Partner of Trip Xpertz) and its service suppliers will also be released from any responsibility towards compensations that the client may claim and will not be considered liable for any inconveniences arising from the said rate difference and/or cancellation.
                                    -Disclaimer "U.S. Citizens"/Cuba- If you are a citizen of the United States of America (USA), or a company controlled or under the ownership of a body of the USA, and therefore relevant to the program administered by The Cuban Assets Control Regulations (“CACR”), and under the regulation 31. C.F.R. § S15, or you are prohibited from acquiring tourist services to Cuba. In the event of acquiring any tourist service to Cuba of those offered on this site, you declare and will be responsible for complying with all the requirements provided under said regulation and any corresponding law, rule or regulation established for that purpose by the USA and/or the Department of Treasury’s Office of Foreign Assets Controls (“OFAC”).</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse4_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Cancellation Policies
                                </a>
                            </h5>
                        </div>
                        <div id="collapse4_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body"><p>
                                All cancellation requests must be addressed in writing to the assigned Travel Consultant with the reservation number as the basis reference.
                                In case of hotel accommodations:
                                At the moment of reserving, specific cancellation policies by the hotel to which you are requesting will automatically be displayed for your information. The following are general cancellation policies which are applicable for most of our listed hotels.
                                - Cancellation requests made 15 (fifteen) or more days prior to confirmed arrival date are subject to a penalization of 10% on the total paid for the reservation.
                                - Cancellation requests made no more than 14 (fourteen) days and no less than 3 (three) days prior to the confirmed arrival date are subject to a penalization equal to the price of 2 (two) nights.
                                - Cancellation requests within 2 (two) days to the confirmed arrival date or a “no-show” are 100% non refundable. No refunds will be granted either for unused portions of the reservation due to an early departure.
                                - Different cancellation policies for reservations made for Christmas, New Year and Easter may apply. Please contact one of our Travel Consultants for further details.
                                In case of tour and/or ground transportation reservations:
                                At the moment of reserving, specific cancellation policies by the tour and transportation to which you are reserving will automatically be displayed for your information. The following are general cancellation policies which are applicable for most of our listed tours and transportation services:
                                - Cancellation requests made 3 (three) or more days prior to the confirmed service date are subject to a 10% penalization on the total amount paid for the reservation.
                                - Cancellation requests within 2 (two) days to the confirmed service date or a “no-show” are 100% non refundable..</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse5_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Domestic and international transfer of data
                                </a>
                            </h5>
                        </div>
                        <div id="collapse5_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Pursuant to the provisions of Articles 36 and 37 of the LFPDPPP your personal data may be transferred to and/or shared with:

                                    a) Controller companies, subsidiaries or affiliates under the common control of Bestday.com (Partner of Travel), or a parent company or any company in the same Bestday.com (Partner of Travel) group that operates under the same internal processes and policies;
                                    b) When the transfer is necessary by virtue of an existing contract or one to be concluded in the owner’s interest by the responsible party and a third party;
                                    c) When the transfer is necessary for maintenance or compliance with a legal relationship between the responsible party and the owner such as Suppliers, Tourist Services Suppliers, Banking and Credit Institutions, among others.
                                    It is important to note that the third parties to whom your personal data are transferred shall be bound by the same terms and conditions of this Privacy Notice and shall comply with the corresponding security and confidentiality measures.
                                    In any event, we hereby undertake not to transfer your personal data to third parties without your consent, unless we are required to do so in accordance with the provisions of Article 37 of the Mexican Law: Ley Federal de Protección de Datos Personales en Posesión de los Particulares, as well as carrying out this transfer under the terms of this law.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse6_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Exercising ARCO Rights
                                </a>
                            </h5>
                        </div>
                        <div id="collapse6_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Article 28 of the LFPDPPP grants you four rights to exercise:

                                    • The owner has the right to Access his/her personal data that are held by the responsible party and to be aware of the Privacy Notice and its purposes.
                                    • The owner has the right to Rectify his/her datain the event that they are inexact, incorrect or outdated.
                                    • The owner has the right to Cancel his/her personal data when he/she considers that they are not being used to fulfill the purposes established in this Privacy Notice.
                                    • The owner has the right to Oppose the processing of his/her personal data in regard to any of the purposes established in this Privacy Notice.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse7_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Right to revoke your consent for data processing
                                </a>
                            </h5>
                        </div>
                        <div id="collapse7_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>uArticle 8 of the LFPDPPP provides for the possibility of revoking the consent granted for the processing of your personal data. To revoke this consent, you may request that we do so using the same mechanism and procedure for exercising the ARCO Rights provided for herein.

                                    However, Bestday.com (Partner of Travel) informs you that keeping your personal data in our database allows us to have a better understanding of your needs based on your history and thereby provide you with better service when making future reservations.

                                    Mechanisms for exercising ARCO Rights and revoking the consent for processing your data To exercise your rights of Access, Rectification, Cancellation and Opposition or your right to revoke the consent for the processing of your personal data, you are required to complete and send the EXERCISE OF ARCO RIGHTS FORM, which you can download here, and submit it to Bestday.com (Partner of Travel) at the following email address: privacidad@Bestday.com (Partner of Travel), or you can submit the form physically to the following address: Avenida Bonampak Manzana 2, Lote 7, Supermanzana 10, Torre “B,” Cancún, Quintana Roo, C.P. 77500, attention Department of Protection of Personal Data, in writing and in Spanish, complying with the requirements set forth in Article 29 of the LFPDPPP. For more information you can contact the Bestday.com (Partner of Travel) Department of Protection of Personal Data directly by phone at: (52) 998 8811300 Ext. 1197 / 1190 / 1690 / 1441 / 1291.
                                    To justify exercising your ARCO Rights, you are required to verify the possession of your ARCO Rights or the representation with respect to the owner through a copy of your identification document and the presentation of the original for comparison purposes, or the instruments indicated in Article 89 of the LFPDPPP.

                                    “Article 29.- The access, rectification, cancellation or opposition request must contain and accompany the following:
                                    I. The name of the owner and address or other means of communicating to you the response to your request;
                                    II. The documents verifying the identity or, where appropriate, the legal representation of the owner;
                                    III. Clear and precise description of the personal data with regard to which you wish to exercise any of the aforementioned rights, and
                                    IV. Any other element or document that facilitates locating personal data.”

                                    Bestday.com (Partner of Travel) will monitor your request for 20 business days starting from the receipt of said FORM or request, with complete documentation, in order to communicate to you the justification of the request. If the request is justified, Bestday.com (Partner of Travel) will have 15 business days to enable you to exercise your ARCO right.

                                    Measures to safeguard your information and to limit the use or disclosure of your personal data Your personal data will be kept in strict confidence. To reasonably prevent the undue use or disclosure of your personal data, we have implemented physical, technical and administrative security measures in accordance with the Mexican Law: Ley Federal de Protección de Datos Personales en Posesión de los Particulares and applicable regulations.

                                    In particular, we have a privacy policy, employee training courses, restricted access to personal data for authorized users only, privacy officers, a personal data inventory (duly classified by data category) of processing systems, risk analysis and contractual clauses.

                                    To ensure that you are able to limit the use and disclosure of your personal data, we offer you the option of registration in the Public Registry to avoid Advertising (Registro Público para Evitar Publicidad or REPEP , its acronym in Spanish), of which the Federal Attorney’s Office of the Consumer (Procuraduría Federal del Consumidor or PROFECO, its acronym in Spanish) is in charge, to ensure that your personal data are not used to receive promotions or advertising from goods or services companies. For more information about this registry, you may consult PROFECO’s web portal or contact PROFECO directly.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse8_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Cookies
                                </a>
                            </h5>
                        </div>
                        <div id="collapse8_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Bestday.com (Partner of Travel) uses its own cookies and those of third parties to analyze your browsing and offer you more personalized service according to your interests.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse9_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Modifications to this notice
                                </a>
                            </h5>
                        </div>
                        <div id="collapse9_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Bestday.com (Partner of Travel) may modify or update this Privacy Notice at any time.
                                </p><p>
                                    The changes or updates that are made will enter into effect at the time that they are published on the website www.Bestday.com (Partner of Travel), on the websites of our affiliates or on any medium that we use to publish them. For this reason, we recommend that you check them on an ongoing basis.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse10payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Express acceptance of the Privacy Notice
                                </a>
                            </h5>
                        </div>
                        <div id="collapse10payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>If you do not expressly oppose this Privacy Notice and its updates, we will assume that you have granted your tacit consent under the terms of Article 8 of the LFPDPPP.
</p><p>Bestday.com (Partner of Travel) recommends that you read this Privacy Notice, given that providing your data by any means constitutes your acceptance of this Privacy Notice.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                </div>
                <!-- /accordion payment -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
@endsection
