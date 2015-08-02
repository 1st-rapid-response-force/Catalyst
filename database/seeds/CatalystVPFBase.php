<?php

use Illuminate\Database\Seeder;

use App\Operation;
use App\Ribbon;
use App\Qualification;
use App\School;


class CatalystVPFBase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schools
        $school = new School;
        $school->name = 'Basic Combat Training';
        $school->storage_image = 'cloud';
        $school->public_image  = 'training_g44mik';
        $school->short_description = 'Basic Combat Training Course - Transitions Recruit to a combat member within the 1st RRF';
        $school->description  = '<p><strong>Basic Combat Course -&nbsp;</strong></p>

<p>The Basic Combat Training Course is the introductory course for all members in the 1st RRF. It&rsquo;s is designed to prepare new recruits for their new role in the unit, allow them to qualify on multiple ranges, and take the oath and become a full member of the 1st RRF.</p>

<p>&nbsp;</p>

<p><strong>Disclaimer</strong>:&nbsp;This document serves as a reference for&nbsp;the 1st RRF&nbsp; It is not an official U.S. Army publication or endorsed by the U.S. Department of Defense and is not intended for use beyond the 1st RRF. This document is not for release to personnel outside the 1st RRF or those granted access by command.&nbsp;</p>
';
        $school->docs  = '<h1>Basic Combat Training Course Info</h1>

<h2>Student Expectations and Time Commitment</h2>

<p>Courses are pre-scheduled and announced on the&nbsp;calendar. Students will need to enroll in a specific date in order to attend and are required to be in attendance punctually at the start of the basic training session.</p>

<p>Student who are late between 1-10 minutes may be allowed to stay with Drill Instructor permission however any student who reports in past this time will be automatically dismissed from the course.</p>

<p>This Basic Training session is anticipated to take between and 1-2 hours depending on class size. Students are expected to complete the class fully in order to be marked as in attendance.</p>

<h2>Graduation Requirements</h2>

<p>To complete the Basic Combat Course of the 23rd Gaming Division students must be in attendance and score the following or higher on the following qualifications/examinations:</p>

<ol>
	<li>Tactical Road March Pass/Fail</li>
	<li>Basic Rifleman Qualifications - Minimum 23/40</li>
	<li>Grenade Qualification - Qualified</li>
	<li>Pistol Qualification - Minimum 11/20</li>
	<li>M249 Qualification - Qualified</li>
	<li>AT-4 Qualification - Qualified</li>
</ol>

<h2>BCT Pre-Course Assignment</h2>

<p>All Basic Training Students are required to read&nbsp;this documentation&nbsp;prior to attending the basic training course.</p>

<h2>Tactical Foot March</h2>

<p>In this section you will be learning basic formations, movement, and application.&nbsp;</p>

<h3>Formations</h3>

<p>You should be familiar and ready to perform the following formations:</p>

<p><img alt="" src="https://lh4.googleusercontent.com/8tykwpp4RgwrirbNLM2VbE4rWcacSuiV6RDsvrUNoKHyHmc8UbKwbo1K3hlfyUEvH8zXsV7I8IM8WCelOpkSbSALvFsqhqSLpQ-9WakKJ4vNvOLMQwW7rgzhnPJOSTOjBF34Og8" style="height:229px; width:338px" /></p>

<h3>Wedge</h3>

<p>The wedge formation is a very versatile one that is easy to establish and control. It allows for good all-around observation and security, and can be used in the majority of situations encountered. Fire can be placed in any direction in good quantity, and a shift in formation upon contact is easy to accomplish to suit where the contact came from.</p>

<h3>Line</h3>

<p>The line formation is great for advancing towards a known threat, as long as there is no significant risk of taking fire from the flanks.</p>

<p>The line formation offers great observation and heavy fire to the front. It is easy to control, but does suffer from the problem noted above - that it is vulnerable to flanking fire. It also does not offer great flank or rear security, so it should be used with that in mind.</p>

<h3>Column, File, Staggered Column</h3>

<p>The column formation is best used during travel when contact is not imminently expected or speed is a high priority. It is the simplest formation to establish, as it is merely a matter of follow-the-leader. It allows for very rapid movement because of this.</p>

<p>A column formation has great firepower to the flanks, but is not geared towards contact from the front (which it is vulnerable to). A column can rapidly shift upon contact to a line or other formation where appropriate, giving it good flexibility.</p>

<p>Column formations can also be used when traveling through an area where it is not practical to spread out into a line, wedge, or other formation. For instance, travel through a restricted valley might require a column.</p>

<p>A staggered column is essentially the same as a column however members of the fire team are on alternating sides as depicted in the figure.&nbsp;</p>

<p>File is the same formation as column however the formation is much more packed and condensed.</p>

<h3>Echelon</h3>

<p>Echelon formations can be established when traveling in an area where the threat direction is overwhelmingly likely to be either to the left or the right of the line of travel. These are basically just half-wedge formations, and they focus firepower towards the flank that has been echeloned.</p>

<p>While they are potentially useful, the odds of seeing them employed effectively, and having their employment be significantly better than using one of the more common formations, is a bit unlikely.</p>

<h3>Vee</h3>

<p>The Vee is a reverse of the Wedge formation, where two elements lead the group, a third acts as trail. This formation is a Squad formation. This formation can be good when you know that contact will mostly come from the front but you don&#39;t want to commit to a line formation and want to maintain flexibility.</p>

<h3>Halts</h3>

<p>There are two halts that we typically employ in a traveling situation:</p>

<ol>
	<li>Short Halt - Squad members should take cover or take a knee while maintaining security these should be fairly brief an example would be around 30 seconds. 360 security should be established however squad members should not move to far away from their original position.</li>
	<li>Long Halt - Squad members should seek hardcover and hit the dirt. They should be maintain their sector of fire, troops do not need to maintain their formation.</li>
</ol>

<h2>Basic Rifle Marksmanship</h2>

<p>Every member needs to be rifle qualified before they are allowed to proceed as a member of the 23rd. During this section students will qualify on 200m course with the M4 5.56 mm weapons system. Depending on the score on the range the student will receive a qualification rating of:</p>

<p><img alt="" src="https://i.imgur.com/ZZzCUfP.png" style="height:180px; width:386px" /></p>

<p>Student will understand the following rules apply to the range:&nbsp;</p>

<ul>
	<li>In order to continue in the training program a student must achieve a rank of Marksman or above. They may re-attempt the section once during the training exercise and if they fail their second attempt will be dropped from the program.</li>
</ul>

<h3>Range Rules</h3>

<ol>
	<li>&nbsp;Treat every weapon as if it were loaded
	<ol>
		<li>When a soldier takes charge of a rifle in any situation, s/he must treat the weapon as if it were loaded, determine its condition, and continue to apply the other safety rules</li>
	</ol>
	</li>
	<li>&nbsp;Never Point your weapon at anything you do not intend to shoot
	<ol>
		<li>&nbsp;soldier must maintain muzzle awareness at all times</li>
	</ol>
	</li>
	<li>&nbsp;Keep your finger straight and off the trigger until you are ready to fire.
	<ol>
		<li>A target must be identified before taking the weapon off safe and moving the finger to the trigger</li>
	</ol>
	</li>
	<li>&nbsp;Keep the weapon on safe until you intend to fire (since we have a safety gun feature, keep your finger off the mouse trigger until you are ready to fire)</li>
</ol>

<p>Students will understand that the following will result in failure of the training course:</p>

<ol>
	<li>Accidental Discharges</li>
	<li>Friendly Fire</li>
	<li>Insubordinate conduct on the range</li>
</ol>

<h3>Range Procedure</h3>

<ol>
	<li>Students will receive their rifleman qualification loadout from the armorer, remove the magazine from the rifle.</li>
	<li>Students will be assigned a firing lane and take position in the firing lane</li>
	<li>Students will be give the instruction to speak with their lane&rsquo;s range master</li>
	<li>Students should take position on the left side of the firing lane in the standing position</li>
	<li>Range master will announce when the range is hot, the targets should go down and will begin to pop up one by one.</li>
	<li>Student will begin to fire one round per target, the rangemaster will announce if the target was a hit or miss.</li>
	<li>After 10 targets the student will move to the crouch position on the right side of the firing lane</li>
	<li>After 10 targets students will move to the middle prone position and reload their rifle</li>
	<li>Students will then support their rifle by using weapons resting</li>
	<li>Students should remove the magazine from their rifle and turn away from their range to signify their are finished</li>
</ol>

<p>If a student requires assistance on the range they need to call over the Drill Instructor</p>

<h2>Grenade Qualification Course</h2>

<p><img alt="" src="https://i.imgur.com/fGPtpuM.png" style="height:144px; width:384px" /></p>

<h3>Grenade Qualification Rules</h3>

<ol>
	<li>&nbsp;Identify your target or target area before throwing a grenade</li>
	<li>Communicate your intent - Throwing a frag blindly with no communication to your teammates will lead to friendly fire and death.</li>
	<li>&nbsp;Always ensure your grenades are not selected as your primary throwing device (you can cycle with CTRL+G)</li>
</ol>

<p>Students will understand that the following will result in failure of the training course:</p>

<ol>
	<li>Accidental Discharges / Accidental Throws</li>
	<li>Friendly Fire</li>
	<li>Insubordinate conduct on the grenade course</li>
</ol>

<h3>Grenade Qualification Procedure</h3>

<ol>
	<li>Students will receive their grenade qualification loadout from the armorer (for the purposes of this training only the grenade is available, on the field another thrown object should be selected)</li>
	<li>Students will be assigned a grenade lane</li>
	<li>Students will identify a set of targets from closest to farthest</li>
	<li>Communicate his intention to throw a grenade by yelling &ldquo;Frag Out!&rdquo;</li>
	<li>Throw frag towards target</li>
	<li>Students will then go prone until the explosion</li>
</ol>

<h2>Pistol Qualification Course</h2>

<p><img alt="" src="https://i.imgur.com/9wWJVTC.png" style="height:177px; width:383px" /></p>

<h3>Pistol Range Rules</h3>

<p>This range uses the same rules and expulsion set as the Basic Rifleman Qualification range</p>

<h3>Pistol Range Procedure</h3>

<ol>
	<li>Students will receive their pistol qualification loadout from the armorer, remove the magazine from the pistol.</li>
	<li>Students will be assigned a firing lane and take position in the firing lane</li>
	<li>Students will be give the instruction to speak with their lane&rsquo;s range master</li>
	<li>Students should take position on the center of the firing lane in the standing position</li>
	<li>Range master will announce when the range is hot, the targets should go down and will begin to pop up one by one.</li>
	<li>Student will begin to fire one round per target, the rangemaster will announce if the target was a hit or miss.</li>
	<li>Students should remove the magazine from their pistol and turn away from their range to signify their are finished.</li>
</ol>

<h2>M249 Qualification Course</h2>

<p>Every member needs to be M249 qualified before they are allowed to proceed as a member of the 23rd. During this section students will qualify on 250m course with the M249 machine gun. This section is instructor graded, you will either pass or fail.</p>

<p>&nbsp;</p>

<p>&nbsp;<img alt="" src="https://lh4.googleusercontent.com/ROCZWYoOXEwKxSfQIIJdWXiE1FkPI989x8rpvnIXZEBbRcDeFDBZ4zmSPAEY84HSnP97Ql1LbHqYuOU4qo7YbX3YNRi8iecVppvItJudXo5ROwV016EhkoTIhFmP_m62Xu7qWM4" /></p>

<h3>M249 Qualification Rules</h3>

<p>This range uses the same rules and expulsion set as the Basic Rifleman Qualification range</p>

<h3>M249 Qualification Procedures</h3>

<ol>
	<li>Students will receive their M249 qualification loadout from the armorer, remove the 100rnd box from the weapon system</li>
	<li>Students assume their firing position on the platform and await for the Drill Instructor to declare the range hot</li>
	<li>Students will engage target groups with 3 round bursts. 15 rounds per target group</li>
	<li>Once student has expended all ammo they will inform their drill instructor.</li>
</ol>

<h2>AT-4</h2>

<p>Every member needs to be AT4 (M136) qualified before they are allowed to proceed as a member of the 23rd. During this section students will qualify on AT4 course with the AT4 launcher. This section is instructor graded, you will either pass or fail.</p>

<h3>AT-4 Qualification Rules</h3>

<ol>
	<li>&nbsp;Never point the weapon unless you intend to shoot it</li>
	<li>&nbsp;Clear your back blast before firing the weapon</li>
</ol>

<h3>AT-4 Qualification Procedures</h3>

<ol>
	<li>Students will equip an AT-4 and M136 missile from the supply box.</li>
	<li>Students will be position on the AT4 range and will be given a target</li>
	<li>Students will vocally confirm the target</li>
	<li>Students will yell &ldquo;CLEAR BACKBLAST&rdquo;</li>
	<li>Students will check their back blast area and yell &ldquo;BACKBLAST CLEAR&rdquo; or &ldquo;CLEAR BACKBLAST&rdquo; if the area is still not clear.</li>
	<li>Students will fire the AT4 and dispose of the tube once fired.</li>
</ol>

<p><img alt="" src="https://lh3.googleusercontent.com/lfSy-evlrm6kZ4OJv4sdL0WyMttZsJR6ngXijaioaeivSJbNLnKQ-fH2jY-Jmuozr0VuHIQ59sDooYWNdxFHuzqonYgflprASyuHSgcCpJr84SKIJ8WxZw0OOwr4Bpu3IuhdPlM" /></p>

<h2>Graduation</h2>

<p>Members will be promoted to the rank of PV2 (E-2).</p>
';
        $school->videos = 'None';
        $school->published = true;
        $school->promotionPoints = 10;
        $school->save();

        $school = new School;
        $school->name = 'Advanced Infantry Training - Infantry';
        $school->storage_image = 'cloud';
        $school->public_image  = 'AIT_bnwezv';
        $school->short_description = 'AIT 11B - After Basic Combat Training, AIT 11B will prepare you for your career as an 11B';
        $school->description  = 'AIT - Infantry';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        $school = new School;
        $school->name = 'Advanced Infantry Training - 68W';
        $school->storage_image = 'cloud';
        $school->public_image  = '68W_hqzw2h';
        $school->short_description = 'AIT 68W - After Basic Combat Training, AIT 68W will prepare you for your career as an 68W Medic';
        $school->description  = 'AIT - Infantry';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        $school = new School;
        $school->name = 'Warrior Leadership Course';
        $school->storage_image = 'cloud';
        $school->public_image  = 'wlc_ia5pgj';
        $school->short_description = 'WLC teaches enlisted members the basic skills to lead small groups of Soldiers';
        $school->description  = 'WLC teaches enlisted members the basic skills to lead small groups of Soldiers';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1,2';
        $school->minimumRankRequired = '5';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        // Ribbon
        $ribbons = new Ribbon;
        $ribbons->name = 'Army Service Ribbon';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Awarded for enlisting in the 1st RRF';
        $ribbons->promotionPoints = 2;
        $ribbons->save();



        //// Qualifications
        $qualification = new Qualification;
        $qualification->name = 'Expert Marksman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_01_tdjlzg';
        $qualification->description  = '';
        $qualification->promotionPoints = 10;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Sharpshooter';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_02_zzqacz';
        $qualification->description  = '';
        $qualification->promotionPoints = 6;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Marksman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_03_jvsf0q';
        $qualification->description  = '';
        $qualification->promotionPoints = 3;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Rifleman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_05_qyf5li';
        $qualification->description  = '';
        $qualification->promotionPoints = 1;
        $qualification->save();





    }
}
