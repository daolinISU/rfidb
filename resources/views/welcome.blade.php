@extends('app')

@section('content')
    <div class="well text-center">
        <h3>Welcome to the ISU Residual Feed Intake Database Website!</h3>
        {!! HTML::image('img/Nursery_pigs_feeding-2.jpg', '', array( 'width' => 400)) !!}
        <br>
    </div>
    <div class="well">

        <h4>Updates</h4>
        <ul style="list-style-type:circle">
            <li><b>12/22/2015:</b>
                <ol>
                    <li>Reset password through email. Reset link expires once get clicked.</li>
                </ol>
            </li>
            <li><b>12/15/2015:</b>
                <ol>
                    <li>Browse database through list of tables and their attributes with multiple selection</li>
                </ol>
            </li>
            <li><b>12/12/2015:</b>
                <ol>
                    <li>Export to excel in query results</li>
                    <li>Export to csv in query results</li>
                </ol>
            </li>
        </ul>
    </div>
    <div class="well">
        <h3 color="red">This site is temporary, you account will be deleted once we find new server and domain name.</h3>
        <h4>Disclaimer</h4>
        <p>
            This website is now under construction. All the information presented here is for testing
            purpose only. All the content is provided for placeholder.
            Tuggle lab makes no representations or warranties of any kind,
            express or implied, about the completeness, accuracy, reliability,
            suitability or availability with respect to the website or the information,
            or related graphics contained on the website for any purpose.
            Any reliance you place on such information is therefore strictly at your own risk.
        </p>
    </div>




@endsection