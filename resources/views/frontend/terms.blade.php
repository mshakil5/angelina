@extends('frontend.layouts.master')

@section('content')

<style>
  .breadcrumb-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 450px;
    position: relative;
  }

  .breadcrumb-section::before {
    content: "";
    position: absolute;
    inset: 0;
  }

  .breadcrumb-section .container {
    position: relative;
    z-index: 2;
  }

  .breadcrumb-title {
    font-size: 2.5rem;
    font-weight: 700;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }

</style>

<style>
  
    .tc-container {
        margin: 50px auto;
        background: #fff;
        padding: 60px;
    }
    .logo-placeholder {
        max-width: 120px;
        margin-bottom: 20px;
    }
    h1 {
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 5px;
    }
    h2 {
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 30px;
    }
    h3 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-top: 35px;
        margin-bottom: 15px;
        color: #000;
    }
    p, li {
        font-size: 1.05rem;
        margin-bottom: 1rem;
    }
    .section-number {
        margin-right: 10px;
    }
    .sub-clause {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;
        padding-left: 30px;
    }
    .clause-number {
        min-width: 40px;
        font-weight: 500;
    }
    /* Mobile adjustment */
    @media (max-width: 768px) {
        .tc-container {
            margin: 20px;
            padding: 30px;
        }
    }
</style>

<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center d-none" style="background-image: url({{ asset('resources/frontend/images/page-banner2.jpg') }});">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3">
        Terms and Conditions
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Terms and Conditions</li>
      </ol>
    </nav>
  </div>
</section>


<!-- Main content -->
<main class="content-wrap mt-3">
  <div class="container">

    {{-- {!! $companyDetails->terms_and_conditions !!} --}}

  </div>
</main>


<div class="container">
    <div class="tc-container">
        <div class="text-center mb-5">
            <h1>Angelina’s Day Care Nursery</h1>
            <h2>Terms and Conditions</h2>
        </div>

        <section>
            <h3>1 Purpose and Scope</h3>
            <p>These Terms and Conditions set out the contractual agreement between Angelina’s Day Care Nursery (ADC) (“the Nursery”) and the parent(s) or legal carer(s) (“the Parent”). They apply to all children attending the Nursery, whether attending on a funded or non-funded basis.</p>
            <p>By accepting a place and signing the Registration Form, Parents confirm that they have read, understood, and agreed to these Terms and Conditions.</p>
        </section>

        <section>
            <h3>2 Admissions and Registration</h3>
            <div class="sub-clause">
                <div class="clause-number">2.1</div>
                <div>Admission is subject to availability, suitability, and completion of all required registration documentation.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">2.2</div>
                <div>The Nursery reserves the right to refuse or withdraw a place where it is unable to meet a child’s needs safely or appropriately.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">2.3</div>
                <div>A child’s place is confirmed only once all required documentation has been received and agreed.</div>
            </div>
        </section>

        <section>
            <h3>3 Sessions and Opening Hours</h3>
            <div class="sub-clause">
                <div class="clause-number">3.1</div>
                <div>The Nursery operates Monday to Friday, excluding bank holidays and designated closure days.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">3.2</div>
                <div>Session types include half-day and full-day sessions, as published in the Nursery Fee Schedule.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">3.3</div>
                <div>Parents must adhere to agreed session times. Late collection may result in additional charges.</div>
            </div>
        </section>

        <section>
            <h3>4 Fees and Payments (Non-Funded Provision)</h3>
            <div class="sub-clause">
                <div class="clause-number">4.1</div>
                <div>Fees for non-funded hours are payable monthly in advance.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">4.2</div>
                <div>Fees remain payable during periods of illness, absence, or holidays taken by the child.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">4.3</div>
                <div>Failure to pay fees on time may result in late payment charges and/or suspension or termination of the child's place.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">4.4</div>
                <div>Fees are reviewed periodically. Parents will be given written notice of any changes.</div>
            </div>
        </section>
        
        <section>
            <h3>5 Government-Funded Early Education Entitlement (Essex LA Aligned)</h3>
            <div class="sub-clause">
                <div class="clause-number">5.1</div>
                <div>ADC offers Early Education Funding in accordance with the Essex County Council Early Years Funding Agreement, the EYFS Statutory Framework, and Department for Education guidance.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">5.2</div>
                <div>Funded Early Education Entitlement is provided free at the point of delivery for eligible children and includes:
                    <ul class="list-unstyled-indent mt-2">
                        <li>15 hours per week (universal entitlement), and/or</li>
                        <li>30 hours per week (extended entitlement, subject to eligibility),</li>
                    </ul>
                    <p class="ms-1">for up to 38 weeks per year, or as a stretched offer across more weeks, where available.</p>
                </div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">5.3</div>
                <div>Funded hours cover the delivery of early education and care only. No compulsory charges are made as a condition of accessing funded hours.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">5.4</div>
                <div>Parents are not required to:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Pay fees in advance to access funded hours</li>
                        <li>Pay deposits, registration fees, or retainers for funded provision</li>
                        <li>Purchase additional hours, services, or sessions as a condition of receiving funded entitlement</li>
                    </ul>
                </div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">5.5</div>
                <div>Funded children are treated no less favourably than non-funded children in terms of access, quality, or provision.</div>
            </div>
        </section>

        <section>
            <h3>6 Voluntary Charges (Essex LA Compliant)</h3>
            <div class="sub-clause">
                <div class="clause-number">6.1</div>
                <div>The Nursery may request voluntary charges for additional services, including:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Food and meals</li>
                        <li>Snacks and refreshments</li>
                    </ul>
                </div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">6.2</div>
                <div>These charges are entirely optional and do not affect:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Access to funded hours</li>
                        <li>Eligibility for Early Education Funding</li>
                        <li>The quality or quantity of education provided</li>
                    </ul>
                </div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">6.3</div>
                <div>Parents may choose to provide their own food instead of paying voluntary food charges.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">6.4</div>
                <div>Parents are responsible for providing consumable items such as nappies, wipes, creams, and spare clothing, unless otherwise agreed.</div>
            </div>
        </section>

        <section>
            <h3>7 Additional Paid Hours and Private Services</h3>
            <div class="sub-clause">
                <div class="clause-number">7.1</div>
                <div>Any hours attended beyond a child’s funded entitlement are classed as additional private paid hours and charged at the Nursery’s published hourly rate.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">7.2</div>
                <div>Additional hours and services are optional and must not be presented as a requirement for accessing funded provision.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">7.3</div>
                <div>All private charges are:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Transparent</li>
                        <li>Clearly itemised</li>
                        <li>Communicated to parents in advance</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h3>8 Funding Eligibility and Documentation</h3>
            <div class="sub-clause">
                <div class="clause-number">8.1</div>
                <div>Parents must provide valid eligibility codes and required documentation in line with Essex County Council requirements.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">8.2</div>
                <div>It is the Parent’s responsibility to:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Ensure eligibility codes remain valid</li>
                        <li>Reconfirm eligibility within required timescales</li>
                    </ul>
                </div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">8.3</div>
                <div>Where eligibility lapses, parents become liable for fees for previously funded hours at the Nursery’s standard rate.</div>
            </div>
        </section>

        <section>
            <h3>9 Absence, Holidays, and Attendance (Funding Rules Applied)</h3>
            <div class="sub-clause">
                <div class="clause-number">9.1</div>
                <div>Funded hours may only be claimed where a child attends, except where Essex LA guidance permits otherwise.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">9.2</div>
                <div>Persistent non-attendance may result in the withdrawal of funded entitlement.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">9.3</div>
                <div>Parents will be informed in writing where funded entitlement is at risk due to attendance concerns.</div>
            </div>
        </section>

        <section>
            <h3>10 Notice Period and Termination</h3>
            <div class="sub-clause">
                <div class="clause-number">10.1</div>
                <div>A minimum of four weeks’ written notice is required to terminate or change a child’s place.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">10.2</div>
                <div>Fees remain payable during the notice period.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">10.3</div>
                <div>The Nursery reserves the right to terminate a place immediately where:
                    <ul class="list-unstyled-indent mt-2">
                        <li>Fees remain unpaid</li>
                        <li>Behaviour places others at risk</li>
                        <li>Nursery policies are persistently breached</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h3>11 Illness and Exclusion</h3>
            <div class="sub-clause">
                <div class="clause-number">11.1</div>
                <div>Children must not attend the Nursery if they are unwell or infectious.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">11.2</div>
                <div>The Nursery follows Public Health guidance regarding exclusion periods.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">11.3</div>
                <div>No fee reductions are given for illness or absence.</div>
            </div>
        </section>

        <section>
            <h3>12 Safeguarding and Child Protection</h3>
            <div class="sub-clause">
                <div class="clause-number">12.1</div>
                <div>ADC is committed to safeguarding and promoting the welfare of all children.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">12.2</div>
                <div>Safeguarding concerns will be managed in line with the Nursery’s Safeguarding and Child Protection Policy and statutory guidance.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">12.3</div>
                <div>Information may be shared with external agencies where legally required.</div>
            </div>
        </section>

        <section>
            <h3>13 Special Educational Needs and Disabilities (SEND)</h3>
            <div class="sub-clause">
                <div class="clause-number">13.1</div>
                <div>ADC is an inclusive setting and is committed to equality of access.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">13.2</div>
                <div>Reasonable adjustments will be made to support children with SEND, subject to available resources and professional advice.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">13.3</div>
                <div>Parents agree to work in partnership with the Nursery and external professionals where required.</div>
            </div>
        </section>

        <section>
            <h3>14 Behaviour and Partnership with Parents</h3>
            <div class="sub-clause">
                <div class="clause-number">14.1</div>
                <div>ADC promotes positive behaviour management in line with EYFS principles.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">14.2</div>
                <div>Parents are expected to support the Nursery’s policies and staff.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">14.3</div>
                <div>Abusive or aggressive behaviour towards staff will not be tolerated.</div>
            </div>
        </section>

        <section>
            <h3>15 Collection of Children</h3>
            <div class="sub-clause">
                <div class="clause-number">15.1</div>
                <div>Children may only be collected by authorised persons named on the registration form.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">15.2</div>
                <div>Identification may be required.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">15.3</div>
                <div>Late collection may incur additional charges.</div>
            </div>
        </section>

        <section>
            <h3>16 Health, Safety, and Medication</h3>
            <div class="sub-clause">
                <div class="clause-number">16.1</div>
                <div>The Nursery complies with all health and safety regulations.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">16.2</div>
                <div>Medication will only be administered with written parental consent and in line with Nursery policy.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">16.3</div>
                <div>Parents must inform the Nursery of any medical conditions or allergies.</div>
            </div>
        </section>

        <section>
            <h3>17 Data Protection and Confidentiality</h3>
            <div class="sub-clause">
                <div class="clause-number">17.1</div>
                <div>ADC complies with UK GDPR and Data Protection legislation.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">17.2</div>
                <div>Personal data is used only for childcare provision, safeguarding, and statutory purposes.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">17.3</div>
                <div>Information is shared only where legally required or with parental consent.</div>
            </div>
        </section>

        <section>
            <h3>18 Complaints</h3>
            <div class="sub-clause">
                <div class="clause-number">18.1</div>
                <div>The Nursery welcomes feedback and aims to resolve concerns promptly.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">18.2</div>
                <div>Complaints should be raised in accordance with the Nursery Complaints Policy.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">18.3</div>
                <div>Parents may contact Ofsted if concerns remain unresolved.</div>
            </div>
        </section>

        <section>
            <h3>19 Changes to Terms and Conditions</h3>
            <div class="sub-clause">
                <div class="clause-number">19.1</div>
                <div>ADC reserves the right to amend these Terms and Conditions where required by law or operational need.</div>
            </div>
            <div class="sub-clause">
                <div class="clause-number">19.2</div>
                <div>Parents will be notified in writing of any significant changes.</div>
            </div>
        </section>

        <section>
            <h3>20 Governing Law</h3>
            <p>These Terms and Conditions are governed by the laws of England and Wales.</p>
        </section>

        <div class="table-responsive">
            <table class="table table-bordered adoption-table">
                <thead>
                    <tr>
                        <th>This policy was adopted on</th>
                        <th>Signed on behalf of the nursery</th>
                        <th>Date for review</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/09/2025</td>
                        <td>Feroza Akter</td>
                        <td>01/09/2026</td>
                    </tr>
                    <tr>
                        <td colspan="3">Location: ADC/1</td>
                    </tr>
                </tbody>
            </table>
        </div>


        

        

    </div>
</div>



@endsection

