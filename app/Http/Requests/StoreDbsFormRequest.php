<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDbsFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Section 1
            'declaration_name'       => 'required|string|max:255',
            'declaration_dob'        => 'required|date|before:today',
            'declaration_email'      => 'required|email|max:255',
            'declaration_date'       => 'required|date',
            'declaration_signature'  => 'required|string|max:255',

            // Section 2
            'applicant_name'         => 'required|string|max:255',
            'post_title'             => 'required|string|max:255',
            'form_ref_number'        => 'nullable|string|max:100',
            'eligibility_ref'        => 'nullable|string|max:100',

            // Document checkboxes
            'docs_group1'            => 'required|array|min:1',
            'docs_group1.*'          => 'string|max:100',
            'docs_group2a'           => 'nullable|array',
            'docs_group2a.*'         => 'string|max:100',
            'docs_group2b'           => 'nullable|array',
            'docs_group2b.*'         => 'string|max:100',

            // Supporting documents
            'supporting_docs'        => 'nullable|array',
            'supporting_docs.*'      => 'file|mimes:jpg,jpeg,png,pdf|max:5120',

            // Verification
            'completed_by'           => 'nullable|string|max:255',
            'completion_date'        => 'nullable|date',
            'completion_signature'   => 'nullable|string|max:255',
            'verified_by'            => 'nullable|string|max:255',
            'verification_date'      => 'nullable|date',
            'verification_signature' => 'nullable|string|max:255',

            // Final
            'accuracy_confirm'       => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'declaration_name.required'      => 'Please enter your full name.',
            'declaration_dob.required'       => 'Please enter your date of birth.',
            'declaration_dob.before'         => 'Date of birth must be in the past.',
            'declaration_email.required'     => 'Please enter your email address.',
            'declaration_email.email'        => 'Please enter a valid email address.',
            'declaration_date.required'      => 'Please enter the declaration date.',
            'declaration_signature.required' => 'Please provide your digital signature.',
            'applicant_name.required'        => 'Please enter the applicant name.',
            'post_title.required'            => 'Please enter the post title.',
            'docs_group1.required'           => 'Please select at least one Group 1 document.',
            'docs_group1.min'                => 'Please select at least one Group 1 document.',
            'supporting_docs.*.mimes'        => 'Only JPG, PNG, and PDF files are allowed.',
            'supporting_docs.*.max'          => 'Each file must not exceed 5 MB.',
            'accuracy_confirm.accepted'      => 'You must confirm the accuracy of all information.',
        ];
    }
}