@extends('frontend.layouts.master')

@section('title', 'Modpack')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Policies</li>
        <li class="active">Disciplinary Guidelines</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Disciplinary Guidelines</h1>
        <h2>Purpose</h2>
        <p>The purpose of this policy is to clarify guidelines for member conduct within the 1st Rapid Response Force.</p>
        <h2>Responsibilities of Members</h2>
        <p>It is the duty and the responsibility of every member of the 1st Rapid Response Force to be aware of and abide by existing policies and rules.</p>
        <h2>Disciplinary Procedure</h2>
        <p>The 1st Rapid Response Force disciplinary policy was created to provide members and leadership with a clear and understandable set of guidelines and expectations for membership within the 1st Rapid Response Force. </p>
        <p>Disciplinary Procedure Event Breakdown:</p>
        <ol>
            <li>Member violates a rule or guideline.</li>
            <li>Member conduct is reported via an Infraction Report by a fellow member.</li>
            <li>Conduct is investigated by the Unit Commander and member in question is contacted.</li>
            <li>The reporting party will remain anonymous (only known by the Commander) throughout the disciplinary policy.</li>
            <li>Upon a completed investigation, the member will be notified of the repercussions of his/her actions.</li>
        </ol>
        <h2>Member Conduct That Can Result in Disciplinary Action</h2>
        <p>1st Rapid Response Force has established general guidelines to govern the conduct of its members. No list of rules can include all instances of conduct that can result in discipline, and the examples below do not replace sound judgment or common-sense behavior.</p>
        <p>Examples of member conduct that would lead to discipline and the usual course of disciplinary action have been separated into four groups, according to the usual severity and impact of the infraction. </p>
        <p>Different violations may be handled differently depending on the group they are in. 1st Rapid Response Force reserves the right to determine the appropriate level of discipline for any inappropriate conduct, including demotion, oral and written warnings, suspension, and discharge.</p>
        <h2>Class</h2>
        <h3>Class 1</h3>
        <p>A group 1 offense typically relate to actions or behaviors that are considered disruptive, unprofessional, but are not serious enough to cause unit wide interference.</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Action</th>
                    <th>1st Reported Offense</th>
                    <th>2nd Reported Offense</th>
                    <th>3rd Reported Offense</th>
                </thead>
                <tbody>
                    <tr>
                        <td valign="middle">Insubordination (non-combat)</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Unprofessional conduct in front of a prospective member</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Unit Commander discretion.</td>
                    </tr>
                    <tr>
                        <td valign="middle">Unprofessional conduct in an official training course</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Unit Commander discretion.</td>
                    </tr>
                    <tr>
                        <td valign="middle">Unprofessional conduct in administrative office</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Unit Commander discretion.</td>
                    </tr>
                    <tr>
                        <td valign="middle">Teamspeak Hot-mic, Communication Spamming</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Restriction of Teamspeak permissions</td>
                        <td valign="middle">Administrative Discharge (Failure to Adapt).</td>
                    </tr>
                    <tr>
                        <td valign="middle">Uniform/Equipment Violation on Garrison</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">NCS, Demotion of Rank, Unit Commander discretion</td>
                    </tr>
                    <tr>
                        <td valign="middle">Uniform/Equipment Violation on Deployment</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">NCS, Demotion of Rank, Unit Commander discretion</td>
                    </tr>
                    <tr>
                        <td valign="middle">Failure to report in</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">NCS, Demotion of Rank, Unit Commander discretion</td>
                    </tr>
                    <tr>
                        <td valign="middle">Unprofessional conduct in an official training course</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Unit Commander discretion.</td>
                    </tr>
                    <tr>
                        <td valign="middle">Failure to report to an official class session after signing up</td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">Unit Commander discretion.</td>
                    </tr>
                    <tr>
                        <td valign="middle">Failure to adhere to Customs and Courtesies </td>
                        <td valign="middle">VCS – with Unit Commander</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record, demotion of rank</td>
                        <td valign="middle">All subsequent actions will be NCSs</td>
                    </tr>
                </tbody>
            </table>
            <h3>Class 2</h3>
            <p>A group 2 offense typically relate to actions or behaviors that are considered very disruptive, immersion breaking, and cause small amounts of unit wide interference.</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Action</th>
                    <th>1st Reported Offense</th>
                    <th>2nd Reported Offense</th>
                    <th>3rd Reported Offense</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td valign="middle">Insubordination (combat)</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">Demotion of Rank, Reassignment (if available)</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Destruction of 1st RRF assets without Command Authorization</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">NCS, Demotion of Rank, Reassignment (if available)</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Abandonment of 1st RRF property without Command Authorization</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">NCS, Demotion of Rank, Reassignment (if available)</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Misuse of the On-Call System</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                        <td valign="middle"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h3>Class 3</h3>
            <p>A group 3 offense typically relate to actions or behaviors that are considered extremely disruptive, disrespectful conduct towards members, and cause large amounts of unit wide interference.</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Action</th>
                    <th>1st Reported Offense</th>
                    <th>2nd Reported Offense</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td valign="middle">Malicious Directed Verbal Threat towards a member or guest</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Malicious Directed Racism towards a member or guest</td>
                        <td valign="middle">Negative Counseling Statement will be added to member record</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Fratricide (without intent)</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                        <td valign="middle"></td>
                    </tr>
                    <tr>
                        <td valign="middle">Enlistment Fraud</td>
                        <td valign="middle">Bad Conduct Discharge</td>
                        <td valign="middle"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h3>Class 4</h3>
            <p>A group 4 offense typically relate to actions or behaviors that the unit has determined to be dishonorable actions which result in the most serious repercussion,  Dishonorable Discharge (complete and total ban from 1st RRF assets). All reported offenses require an emergency Command Hearing to be convened.</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Action</th>
                    <th>1st Reported Offense</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td valign="middle">Fratricide (with intent)</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Conspiracy</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Sabotage of 1st RRF Server Infrastructure</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge<br><br>We will pursue charges and contact local law enforcement authorities in member’s local municipality </td>
                    </tr>
                    <tr>
                        <td valign="middle">Recruitment of 1st RRF members for another MILSIM organization.</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    <tr>
                        <td valign="middle">Dual Membership in another MILSIM organization</td>
                        <td valign="middle">Suspension of Unit Activities until
                            Command Hearing regarding the charge</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h2>Appendix</h2>
            <h3>Command Hearing</h3>
            <p>For group 3 (Fratricide without intent) and all group 4 offenses, a gathering of unit officials will be convened as soon as possible (within 48 hours of conduct). The member who has been accused of a group 3,4 offense will be notified of the meeting time and will be suspended from all 1st Rapid Response Force systems until the hearing.</p>
            <p><strong>Command Attendance</strong><br>Command Level Meetings will consist of the following members:</p>
            <ol>
                <li>Unit Commander</li>
                <li>Theatre Commander</li>
                <li>Infantry Commander</li>
                <li>Artillery Commander</li>
                <li>One Non-Commissioned Officer</li>
            </ol>
            <p>For a quorum to be reached at least 3 members (command level) must be present (including the Unit Commander).</p>
            <p><strong>Hearing Schedule</strong><br>Command Level Meetings will consist of the following members:</p>
            <ol>
                <li>Roll Call</li>
                <li>Arraignment</li>
                <li>Defense Statement and Evidence</li>
                <li>Command Deliberation</li>
                <li>Decision</li>
            </ol>
            <p>All decision made at these hearings are final.</p>
            <h3>VCS - Verbal Counseling Statement</h3>
            <p>A verbal counseling statement also known as a “developmental counseling statement” are intended to be completed with the member who is being counseled. VCS are not intended to be a negative, they are used to assist leaders in conducting and recording counseling data pertaining to their subordinates.</p>
            <h3>NCS - Negative Counseling Statement</h3>
            <p>A negative counseling statement is intended to be completed with the member who is being counseled. NCS are a permanent negative record on a soldier's virtual personal file, they are used to assist leaders in conducting and correcting negative behavior and plan with the soldier a method to avoid further behavior. </p>


        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
