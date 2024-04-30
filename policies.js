$(document).ready(function() {
    $('#filterForm').submit(function(event) {
        event.preventDefault();

        var educationLevel = $('#educationLevel').val();
        var employmentStatus = $('#employmentStatus').val();

        $.ajax({
            url: 'fetch_policies.php',
            type: 'GET',
            data: {
                education_level: educationLevel,
                employment_status: employmentStatus
            },
            success: function(response) {
                displayPolicies(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching policies:', error);
            }
        });
    });

    function displayPolicies(policies) {
        var policyList = $('#policyList');
        policyList.empty();

        policies.forEach(function(policy) {
            var policyCard = `
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">${policy.title}</h5>
                        <p class="card-text">${policy.description}</p>
                        <ul class="list-unstyled">
                            <li>Age Range: ${policy.min_age || 'Not specified'} - ${policy.max_age || 'Not specified'}</li>
                            <li>Income Range: ${policy.min_income ? '$' + policy.min_income.toLocaleString() : 'Not specified'} - ${policy.max_income ? '$' + policy.max_income.toLocaleString() : 'Not specified'}</li>
                            <li>Gender: ${policy.gender}</li>
                            <li>Urban: ${policy.urban ? 'Yes' : 'No'}</li>
                            <li>Rural: ${policy.rural ? 'Yes' : 'No'}</li>
                            <li>Education Level: ${policy.education_level}</li>
                            <li>Employment Status: ${policy.employment_status}</li>
                            <li>Health Condition: ${policy.health_condition}</li>
                        </ul>
                    </div>
                </div>
            `;
            policyList.append(policyCard);
        });
    }
});
