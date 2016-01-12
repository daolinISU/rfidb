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
            <li><b>01/12/2016:</b>
                <ul>
                    <li>Change advanced search to using MySQL script directly</li>
                    <li>Hint when illigal query is requested in both search</li>
                </ul>
            </li>
            <li><b>01/11/2016:</b>
                <ul>
                    <li>fix table and attributes name upper case to lower case, show underscore.</li>
                </ul>
            </li>
            <li><b>01/09/2016:</b>
                <ul>
                    <li>Add filter to basic search.</li>
                </ul>
            </li>
            <li><b>01/06/2016:</b>
                <ul>
                    <li>Add browse database to Basic search. Now tables without pig id can be queried as well.</li>
                </ul>
            </li>
            <li><b>12/28/2015:</b>
                <ul>
                    <li>User can changge password through user profile -> reset password. Email will be sent to notify user.</li>
                </ul>
            </li>
            <li><b>12/22/2015:</b>
                <ul>
                    <li>Reset password through email. Reset link expires once get clicked.</li>
                </ul>
            </li>
            <li><b>12/15/2015:</b>
                <ul>
                    <li>Browse database through list of tables and their attributes with multiple selection</li>
                </ul>
            </li>
            <li><b>12/12/2015:</b>
                <ul>
                    <li>Export to excel in query results</li>
                    <li>Export to csv in query results</li>
                </ul>
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