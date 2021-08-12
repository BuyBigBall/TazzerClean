$(document).ready(function() {
    $('#post_job_form').bootstrapValidator({
        excluded: ':disabled',
        fields: {
            job_tittle: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Job Tilte ...'
                    }
                }
            },
            // job_description: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please Enter Job Description ...'
            //         }
            //     }
            // },
            job_type: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Job Type'
                    },
                }
            },
            amount: {
                validators: {
                    notEmpty: {
                        message: 'Please Input Price Amount'
                    }
                }
            },

        }
    }).on('success.form.bv', function(e) {
        return true;
    });
});