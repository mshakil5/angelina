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
  
    .policy-container {
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
        font-size: 2rem;
        margin-bottom: 20px;
        color: #000;
    }
    h2 {
        font-weight: 600;
        font-size: 1.5rem;
        margin-top: 30px;
        margin-bottom: 15px;
        color: #000;
    }
    h3 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-top: 25px;
        margin-bottom: 15px;
        color: #000;
    }
    .contact-info p {
        margin-bottom: 5px;
    }
    .contact-info a {
        color: #0d6efd;
        text-decoration: none;
    }
    .contact-info a:hover {
        text-decoration: underline;
    }
    ul {
        padding-left: 20px;
        margin-bottom: 1.5rem;
    }
    li {
        margin-bottom: 8px;
        font-size: 1.05rem;
    }
    p {
        font-size: 1.05rem;
        margin-bottom: 1rem;
    }
    @media (max-width: 768px) {
        .policy-container {
            margin: 20px;
            padding: 30px;
        }
    }
</style>

<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center d-none" style="background-image: url({{ asset('resources/frontend/images/page-banner2.jpg') }});">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3">
        Privacy Policy
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Privacy Policy</li>
      </ol>
    </nav>
  </div>
</section>


<!-- Main content -->
<main class="content-wrap mt- 3">
  <div class="container">

    {{-- {!! $companyPrivacy->privacy_policy !!} --}}

  </div>
</main>


<div class="container">
    <div class="policy-container">
        <div class="text-center mb-5">
            <h1>Angelina’s Day Care Nursery</h1>
            <h1>Privacy Policy</h1>
        </div>
        
        <section>
            <h3>Who We Are</h3>
            <p>Angelina’s Day Care (“the Nursery”, “we”, “our”, or “us”) takes privacy and data protection very seriously. We are committed to protecting the personal information of children, parents/carers, staff, and visitors.</p>
            <p>This Privacy Policy explains how we collect, use, store, and share personal information in accordance with the UK General Data Protection Regulation (UK GDPR) and the Data Protection Act 2018.</p>
            <p>Angelina’s Day Care is the Data Controller for the purposes of data protection law.</p>
            
            <div class="contact-info mt-3">
                <p><strong>Website:</strong> <a href="http://www.angelinasdaycare.co.uk">www.angelinasdaycare.co.uk</a></p>
                <p><strong>Email:</strong> <a href="mailto:info@angelinasdaycare.co.uk">info@angelinasdaycare.co.uk</a></p>
                <p><strong>Phone:</strong> 01206 617320</p>
                <p><strong>Location:</strong> Colchester, Essex</p>
            </div>
        </section>

        <hr class="my-5">

        <section>
            <h2>GDPR Privacy Notice</h2>
            <p>This policy operates in accordance with our Record Management and Retention Schedule and should be read alongside it. Retention periods are reviewed regularly to ensure continued compliance with EYFS and data protection requirements.</p>
        </section>

        <section>
            <h2>Children’s Records</h2>
            <p>We collect, hold, and share the following information about children:</p>
            <ul>
                <li>Personal details (name, address, date of birth)</li>
                <li>Characteristics (ethnicity, languages spoken, nationality, country of birth)</li>
                <li>Attendance information (sessions attended, absences and reasons)</li>
                <li>Observations, assessments, and progress tracking</li>
                <li>Medical information and dietary requirements</li>
                <li>Special Educational Needs and Disabilities (SEND) information</li>
                <li>Accident and incident records</li>
                <li>Safeguarding concerns, referrals, or records</li>
            </ul>
        </section>

        <section>
            <h2>Parent / Guardian Details within Children’s Records</h2>
            <p>We also hold information about parents/guardians, including:</p>
            <ul>
                <li>Names, addresses, telephone numbers, and email addresses</li>
                <li>National Insurance numbers (where required for funded hours)</li>
                <li>Dates of birth (where required for Early Years Pupil Premium)</li>
                <li>Emergency contact details</li>
            </ul>
        </section>

        <section>
            <h2>Why We Collect Children’s Data</h2>
            <p>We collect this information to:</p>
            <ul>
                <li>Meet the requirements of the Early Years Foundation Stage (EYFS)</li>
                <li>Support children’s learning, development, and wellbeing</li>
                <li>Plan appropriate activities and monitor progress</li>
                <li>Safeguard children and promote welfare</li>
                <li>Contact parents/carers in emergencies</li>
                <li>Administer Early Education Funding through Essex County Council</li>
                <li>Meet statutory and regulatory obligations</li>
                <li>Self-evaluate and improve the quality of our provision</li>
            </ul>
            <p>Most information is mandatory to meet legal requirements. Some information is provided on a voluntary basis, and parents will be informed where this applies.</p>
        </section>

        <section>
            <h3>The lawful basis for processing includes:</h3>
            <ul>
                <li>Legal obligation</li>
                <li>Contractual necessity</li>
                <li>Consent, where required</li>
            </ul>
        </section>

        <section>
            <h2>How We Store Children’s Data</h2>
            <p>Children’s data is stored securely in electronic and/or paper form. Access is restricted to authorised staff only, including:</p>
            <ul>
                <li>Nursery Manager</li>
                <li>Deputy Manager</li>
                <li>Designated Safeguarding Lead</li>
                <li>Administration staff (where required)</li>
            </ul>
            <p>Data is retained for a reasonable period after a child leaves the nursery, in line with EYFS and statutory guidance.</p>
        </section>

        <section>
            <h2>Who We Share Children’s Data With</h2>
            <p>We may share children’s data with relevant agencies, including:</p>
            <ul>
                <li>Essex County Council (funding and monitoring)</li>
                <li>Ofsted</li>
                <li>Schools (to support transition)</li>
                <li>Health professionals (e.g. speech and language therapists)</li>
                <li>SEND services</li>
                <li>The Department for Education (e.g. early years census)</li>
            </ul>
        </section>


        <section>
            <h3>Safeguarding exception:</h3>
            <p>Where there is a risk of serious harm, information may be shared without parental consent with appropriate authorities.</p>
            <p>Parents may specify authorised individuals on registration forms and must notify us in writing of any changes.</p>
        </section>

        <section>
            <h2>Sharing Parents’ and Guardians’ Data</h2>
            <p>Parents’ data is kept confidential and only shared where:</p>
            <ul>
                <li>Required by law</li>
                <li>Necessary for safeguarding</li>
                <li>Required in an emergency</li>
                <li>Required for funding administration</li>
            </ul>
        </section>

        <section>
            <h2>Requesting Access to Personal Data</h2>
            <p>Under UK GDPR, you have the right to:</p>
            <ul>
                <li>Request access to your personal data</li>
                <li>Request correction of inaccurate data</li>
                <li>Request erasure or restriction (where applicable)</li>
                <li>Object to certain processing activities</li>
            </ul>
            <p>Requests should be made in writing to the Nursery Manager.</p>
            <p>You also have the right to raise concerns with us directly. If unresolved, you may contact the Information Commissioner’s Office (ICO).</p>
        </section>

        <section>
            <h2>Website Data Collection</h2>
            <p>When visiting our website, we do not attempt to identify visitors. Personal information is collected only where voluntarily provided (e.g. enquiry forms).</p>
            <p>We may collect basic technical data to help improve website performance. No unnecessary personal data is collected.</p>
        </section>

        <section>
            <h2>Cookies</h2>
            <p>Cookies are small text files placed on your device to help websites function correctly. Any cookies used by our website are explained in our separate Cookie Policy.</p>
        </section>

        <section>
            <h2>Data Retention</h2>
            <p>Personal data is retained only as long as necessary to fulfil its purpose and meet legal requirements. Further details are available in our Data Retention Policy.</p>
        </section>


        <section>
            <h2>Changes to This Privacy Policy</h2>
            <p>We may update this policy from time to time. The latest version will always be available on our website and in the nursery.</p>
        </section>

        <section>
            <h3>Contacting Us</h3>
            <p>If you have any questions, concerns, or requests regarding this Privacy Policy, please contact:</p>
            
            <div class="contact-details">
                <p><strong>Angelina’s Day Care</strong><br>
                Colchester, Essex<br>
                <strong>Email:</strong> <a href="mailto:info@angelinasdaycare.co.uk">info@angelinasdaycare.co.uk</a><br>
                <strong>Phone:</strong> 01206 617320</p>
            </div>
            
            <p class="mt-4">You also have the right to complain to the Information Commissioner’s Office (ICO) at <a href="https://www.ico.org.uk" target="_blank">www.ico.org.uk</a> | Tel: 0303 123 1113.</p>
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

