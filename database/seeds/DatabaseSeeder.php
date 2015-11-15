<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\User_qual;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

		$this->call('ConfigsTableSeeder');
		$this->call('CountiesTableSeeder');
		$this->call('EmailsTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('OrganisationsTableSeeder');
		$this->call('StylesTableSeeder');
		$this->call('QualificationsTableSeeder');
		$this->call('UsersTableCreate');
		$this->call('UserQualsTableCreate');

		Model::reguard();
	}
}

class UserQualsTableCreate1 extends Seeder
{

	public function run()
	{
		//delete configs table records
		DB::table('user_quals')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		$user_id = DB::table('users')
			->select('id')
			->where('email', 'paul.hayter@gmx.co.uk')
			->first()
			->id;

		DB::table('user_quals')->insert(array(
			array(
				'user_id'=>$user_id,
				'qual_level'=>'BSc',
				'qual_subject'=>'Computer Science',
				'qual_college'=>'Hatfield Polytechnic',
				'qual_town'=>'Hatfield',
				'qual_county'=>'Hertfordshire',
				'qual_start'=>1980,
				'qual_end'=>1984,
				'qual_status'=>1,
				'qual_approved'=>1,
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));

		$user_id = DB::table('users')
			->select('id')
			->where('email', 'test1@counselling.ltd.uk')
			->first()
			->id;

		DB::table('user_quals')->insert(array(
			array(
				'user_id'=>$user_id,
				'qual_level'=>'BSc',
				'qual_subject'=>'Computer Science',
				'qual_college'=>'Hatfield Polytechnic',
				'qual_town'=>'Hatfield',
				'qual_county'=>'Hertfordshire',
				'qual_start'=>1980,
				'qual_end'=>1984,
				'qual_status'=>1,
				'qual_approved'=>1,
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));

		$user_id = DB::table('users')
			->select('id')
			->where('email', 'test2@counselling.ltd.uk')
			->first()
			->id;

		DB::table('user_quals')->insert(array(
			array(
				'user_id'=>$user_id,
				'qual_level'=>'BSc',
				'qual_subject'=>'Computer Science',
				'qual_college'=>'Hatfield Polytechnic',
				'qual_town'=>'Hatfield',
				'qual_county'=>'Hertfordshire',
				'qual_start'=>1980,
				'qual_end'=>1984,
				'qual_status'=>1,
				'qual_approved'=>1,
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));
	}
}

class UsersTableCreate extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();

		DB::statement("SET foreign_key_checks = 0");

		User::truncate();

		$user = User::create([
			'first_name' => 'Paul',
			'last_name' => 'Hayter',
			'name' => 'Paul Hayter',
			'email' => 'paul.hayter@gmx.co.uk',
			'old_password' => $faker->password,
			'group_id' => 1,
			'active' => 4
		]);

		foreach(range(2,31) as $id)
		{
			$name = $faker->firstName(null);
			$surname = $faker->lastName;
			$user = User::create([
				'first_name' => $name,
				'last_name' => $surname,
				'name' => $name.' '.$surname,
				'email' => $faker->email,
				'old_password' => $faker->password,
				'group_id' => 20,
				'active' => $faker->numberBetween(0,3)
			]);
		}
	}
}

class UserQualsTableCreate extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();


		User_qual::truncate();

		foreach(range(1,31) as $id)
		{
			$user = User_qual::create([
				'user_id'=>$id,
				'qual_level'=>'BSc',
				'qual_subject'=>'Computer Science',
				'qual_college'=>'Hatfield Polytechnic',
				'qual_town'=>'Hatfield',
				'qual_county'=>'Hertfordshire',
				'qual_start'=>1980,
				'qual_end'=>1984,
				'qual_status'=>1,
				'qual_approved'=>1,
				'created_at'=> $faker->dateTime('now'),
				'updated_at'=> $faker->dateTime('now')
			]);
		}
	}
}

class UsersTableCreate1 extends Seeder
{

	public function run()
	{
		//delete configs table records
		DB::table('users')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		$super_admin_role = DB::table('groups')
			->select('group_id')
			->where('description', 'super_admin')
			->first()
			->group_id;
		$admin_role = DB::table('groups')
			->select('group_id')
			->where('description', 'admin')
			->first()
			->group_id;
		$member_role  = DB::table('groups')
			->select('group_id')
			->where('description', 'member')
			->first()
			->group_id;

		DB::table('users')->insert(array(
			array(
				'name'=>'paulhayter',
				'first_name'=>'Paul',
				'last_name'=>'Hayter',
				'hostreet'=>'38 Kings Crescent',
				'add2'=>'Boston',
				'postcode'=>'PE21 0AP',
				'email'=>'paul.hayter@gmx.co.uk',
				'old_password'=>bcrypt('123456'),
				'active'=>4,
				'group_id'=>$super_admin_role,
				'dob'=>date('1945-08-19'),
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));

		DB::table('users')->insert(array(
			array(
				'name'=>'anadmin',
				'first_name'=>'A N',
				'last_name'=>'Admin',
				'hostreet'=>'38 Kings Crescent',
				'add2'=>'Boston',
				'postcode'=>'PE21 0AP',
				'email'=>'test1@counselling.ltd.uk',
				'old_password'=>bcrypt('123456'),
				'active'=>4,
				'group_id'=>$admin_role,
				'dob'=>date('1945-08-19'),
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));

		DB::table('users')->insert(array(
			array(
				'name'=>'amember',
				'first_name'=>'A',
				'last_name'=>'Member',
				'hostreet'=>'38 Kings Crescent',
				'add2'=>'Boston',
				'postcode'=>'PE21 0AP',
				'email'=>'test2@counselling.ltd.uk',
				'old_password'=>bcrypt('123456'),
				'active'=>3,
				'group_id'=>$member_role,
				'dob'=>date('1945-08-19'),
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));
	}
}

class QualificationsTableSeeder extends Seeder {

	public function run()
	{
		//delete emails table records
		DB::table('qualifications')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('qualifications')->insert(array(
			array(
				'qualification'=>'Foundation',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Introduction',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'RSA',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Certificate',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Advanced Certificate',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Certified',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Diploma',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Advanced Diploma',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Postgraduate Certificate',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Graduate Diploma',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Postgraduate Diploma',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'HND',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'HNC',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'BSc',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'BSc(Hons)',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'MSc',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'MSc(Hons)',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'BA',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'BA(Hons)',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'MA',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Ph.D',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'Higher Diploma',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NCFE Level 5',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NVQ Level 1',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NVQ Level 2',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NVQ Level 3',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NVQ Level 4',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'NVQ Level 5',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'SVQ Level 1',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'SVQ Level 2',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'SVQ Level 3',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'SVQ Level 4',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'qualification'=>'SVQ Level 5',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));
	}
}

class StylesTableSeeder extends Seeder {

	public function run()
	{
		//delete emails table records
		DB::table('styles')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('styles')->insert(array(
			array(
				'style'=>'Person Centred',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Humanistic',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Psychodynamic',
				'created_at'=> $now,
				'updated_at'=> $now,
			),array(
				'style'=>'Eclectic',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Cognitive Behavioural',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Cognitive',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Behavioural',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Integrative',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Inter-Cultural',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Human Givens Brief Therapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Solution Focused Brief Therapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Systemic',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Philosophical',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Transactional Analysis',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Gestalt',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Non-directive',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'Existential',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'NLP',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'style'=>'EMDR',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));
	}
}

class ConfigsTableSeeder extends Seeder {

	public function run()
	{
		//delete configs table records
		DB::table('configs')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('configs')->insert(array('office_1'=>'5 Pear Tree Walk','office_2'=>'Wakefield', 'office_3'=>'West Yorkshire', 'office_4'=>'', 'office_pc'=>'WF2 0HW', 'spare'=>'', 'created_at'=> $now, 'updated_at'=> $now,)
		);
	}
}

class OrganisationsTableSeeder extends Seeder {

	public function run()
	{
		//delete organisations table records
		DB::table('organisations')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('organisations')->insert(array(
			array(
				'org_url'=>'www.bacp.co.uk',
				'org_ini'=>'BACP',
				'org_long'=>'British Association for Counselling and Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ispc.org.uk',
				'org_ini'=>'ISPC',
				'org_long'=>'International Society of Professional Counsellers',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.arebt.org',
				'org_ini'=>'AREBT',
				'org_long'=>'Association for Rational Emotive Behaviour Therapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ukcp.org.uk',
				'org_ini'=>'UKCP',
				'org_long'=>'United Kingdom Council for Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.relate.org.uk',
				'org_ini'=>'RELATE',
				'org_long'=>'Relate',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.babcp.org.uk',
				'org_ini'=>'BABCP',
				'org_long'=>'British Association for Behavioural and Cognitive Psychotherapies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.wpf.org.uk',
				'org_ini'=>'WPF',
				'org_long'=>'Westminster Pastoral Foundation',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.bps.org.uk',
				'org_ini'=>'BPS',
				'org_long'=>'British Psychological Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.irish-counselling.ie',
				'org_ini'=>'IACP',
				'org_long'=>'Irish Association for Counselling and Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.basrt.org.uk',
				'org_ini'=>'BASRT',
				'org_long'=>'British Association for Sexual and Relationship Therapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.hgi.org.uk',
				'org_ini'=>'HGI',
				'org_long'=>'Human Givens Institute',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.mindfields.org.uk/etsi/',
				'org_ini'=>'ETSI',
				'org_long'=>'European Therapy Studies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.general-hypnotherapy-register.com',
				'org_ini'=>'GHR',
				'org_long'=>'General Hypnotherapy Register',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ghsc.co.uk',
				'org_ini'=>'GHSC',
				'org_long'=>'General Hypnotherapy Standards Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.iahip.com',
				'org_ini'=>'IAHIP',
				'org_long'=>'Irish Association of Humanistic and Integrative Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.aphp.co.uk',
				'org_ini'=>'APHP',
				'org_long'=>'Association for Professional Hypnosis and Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.therapyregister.net',
				'org_ini'=>'SFTR',
				'org_long'=>'Sherwood Foundation Therapists Register',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'i-p-n.org',
				'org_ini'=>'IPN',
				'org_long'=>'Independent Practitioners Network',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.childline.org.uk',
				'org_ini'=>'CHILDLINE',
				'org_long'=>'Childline',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.crusebereavementcare.org.uk',
				'org_ini'=>'CRUSE',
				'org_long'=>'Cruse Bereavement Care',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.mind.org.uk',
				'org_ini'=>'MIND',
				'org_long'=>'National Association for Mental Health',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.samaritans.org',
				'org_ini'=>'SAMARITANS',
				'org_long'=>'Samaritans',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.victimsupport.org',
				'org_ini'=>'VICTIM SUPPORT',
				'org_long'=>'Victim Support',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.gmc-uk.org',
				'org_ini'=>'GMC',
				'org_long'=>'General Medical Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),array(
				'org_url'=>'www.nmc-uk.org',
				'org_ini'=>'NMC',
				'org_long'=>'Nursing and Midwifery Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),array(
				'org_url'=>'www.acad.org.uk',
				'org_ini'=>'ACAD',
				'org_long'=>'Advice and Counselling on Alcohol and Drugs',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.acc-uk.org',
				'org_ini'=>'ACC',
				'org_long'=>'Association of Christian Counsellors',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.acat.me.uk',
				'org_ini'=>'ACAT',
				'org_long'=>'Association for Cognitive Analytical Therapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.adleriansociety.co.uk',
				'org_ini'=>'AS',
				'org_long'=>'Adlerian Society (UK)',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.babcp.org.uk',
				'org_ini'=>'BABCP',
				'org_long'=>'British Association for Behavioural and Cognitive Psychotherapies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.bapca.org.uk',
				'org_ini'=>'BAPCA',
				'org_long'=>'British Association for the Person Centred Approach',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.hypnotherapy-association.org',
				'org_ini'=>'BHA',
				'org_long'=>'British Hypnotherapy Association',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.bpos.org',
				'org_ini'=>'BPOS',
				'org_long'=>'British Psychosocial Oncology Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.cosca.org.uk',
				'org_ini'=>'COSCA',
				'org_long'=>'Confederation of Scottish Counselling Agencies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.nationalcounsellingsociety.com',
				'org_ini'=>'NCS',
				'org_long'=>'The National Counselling Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.gpti.org.uk',
				'org_ini'=>'GPTI',
				'org_long'=>'Gestalt Psychotherapy and Training Institute',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.thehypnotherapyassociation.co.uk',
				'org_ini'=>'HA',
				'org_long'=>'Hypnotherapy Association',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.hypnotherapysociety.com',
				'org_ini'=>'HS',
				'org_long'=>'Hypnotherapy Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.iahip.com',
				'org_ini'=>'IAHIP',
				'org_long'=>'Irish Association of Humanistic and Integrative Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.collegeofcounselling.com',
				'org_ini'=>'IC',
				'org_long'=>'Institute of Counselling',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ukrconline.org.uk',
				'org_ini'=>'UKRC',
				'org_long'=>'Registered Independent Counsellor',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.psychotherapy.org.uk',
				'org_ini'=>'UKCP',
				'org_long'=>'United Kingdom Council for Psychotherapy',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.existentialanalysis.co.uk',
				'org_ini'=>'SEA',
				'org_long'=>'Society for Existential Analysis',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.society-for-philosophy-in-practice.org',
				'org_ini'=>'SPP',
				'org_long'=>'Society for Philosophy in Practice',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.pctscotland.co.uk',
				'org_ini'=>'PCTS',
				'org_long'=>'Association for Person Centred Therapy Scotland',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.nationalhypnopsychotherapycouncil.org.uk',
				'org_ini'=>'NHC',
				'org_long'=>'National Hypnopsychotherapy Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.nrhp.co.uk',
				'org_ini'=>'NRHP',
				'org_long'=>'National Hypnopsychotherapy Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.metanoia.ac.uk',
				'org_ini'=>'MI',
				'org_long'=>'Metanoia Institute',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ita.org.uk',
				'org_ini'=>'ITA',
				'org_long'=>'Institute of Transactional Analysis',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.isma.org.uk',
				'org_ini'=>'ISMA',
				'org_long'=>'International Stress Management Association',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.bcp.org.uk',
				'org_ini'=>'BCP',
				'org_long'=>'British Psychoanalytic Council',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.psychoanalysts.org.uk',
				'org_ini'=>'CPUK',
				'org_long'=>'College of Psychoanalysts',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.nas.org.uk',
				'org_ini'=>'NAS',
				'org_long'=>'National Autistic Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.cpc-online.co.uk',
				'org_ini'=>'CPC',
				'org_long'=>'Counsellors and Psychotherapists in Primary Care',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.purenlp.com/society.htm',
				'org_ini'=>'SNLP',
				'org_long'=>'Society of Neuro-Linguistic Programming',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.i-c-m.org.uk',
				'org_ini'=>'BRCP',
				'org_long'=>'Institute for Complementary Medicine',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.instituteofwelfare.co.uk',
				'org_ini'=>'IW',
				'org_long'=>'Institute of Welfare',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ukatc.info',
				'org_ini'=>'UKATC',
				'org_long'=>'United Kingdom Association for Therapeutic Counselling',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.cipd.co.uk',
				'org_ini'=>'CIPD',
				'org_long'=>'Chartered Institute of Personnel and Development',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.ukpts.co.uk',
				'org_ini'=>'UKPTS',
				'org_long'=>'United Kingdom Psychological Trauma Society',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'estss.org',
				'org_ini'=>'ESTSS',
				'org_long'=>'The European Society for Traumatic Stress Studies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'istss.org',
				'org_ini'=>'ISTSS',
				'org_long'=>'The International Society for Traumatic Stress Studies',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.atss.info',
				'org_ini'=>'ATSS',
				'org_long'=>'Association of Traumatic Stress Specialists',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.tir.org',
				'org_ini'=>'TIRA',
				'org_long'=>'Traumatic Incident Reduction Association',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
			array(
				'org_url'=>'www.contextualpsychology.org',
				'org_ini'=>'ACBS',
				'org_long'=>'Association for Contextual Behavioural Science',
				'created_at'=> $now,
				'updated_at'=> $now,
			),
		));
	}
}

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		//delete emails table records
		DB::table('groups')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('groups')->insert(array(
			array('group_id'=>1,'description'=>'super_admin', 'created_at'=> $now, 'updated_at'=> $now,),
			array('group_id'=>2,'description'=>'admin', 'created_at'=> $now, 'updated_at'=> $now,),
			array('group_id'=>20,'description'=>'member', 'created_at'=> $now, 'updated_at'=> $now,),
		));
	}
}

class EmailsTableSeeder extends Seeder {

	public function run()
	{
		//delete emails table records
		DB::table('emails')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('emails')->insert(array(
			array('address'=>'resources', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'unsubscribe', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'maintenance', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'no_reply', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'support', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'membership', 'created_at'=> $now, 'updated_at'=> $now,),
			array('address'=>'admin', 'created_at'=> $now, 'updated_at'=> $now,),
		));
	}
}

class CountiesTableSeeder extends Seeder {

	public function run()
	{
		//delete counties table records
		DB::table('counties')->delete();

		//insert records

		$now = date('Y-m-d H:i:s');

		DB::table('counties')->insert(array(
				array('country'=>'England', 'county'=>'Avon', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Bedfordshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Berkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Bristol', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Buckinghamshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Cambridgeshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Cheshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Cleveland', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Cornwall', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Cumbria', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Derbyshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Devon', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Dorset', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Durham', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'East Riding of Yorkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'East Sussex', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Essex', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Gloucestershire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Greater Manchester', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Hampshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Herefordshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Hertfordshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Humberside', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Isle of Wight', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Isles of Scilly', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Kent', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Lancashire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Leicestershire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Lincolnshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'London', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Merseyside', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Middlesex', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Norfolk', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'North Yorkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Northhamptonshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Northumberland', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Nottinghamshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Oxfordshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Rutland', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Shropshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Somerset', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'South Yorkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Staffordshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Suffolk', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Surrey', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Tyne and Wear', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Warwickshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'West Midlands', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'West Sussex', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'West Yorkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Wiltshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'England', 'county'=>'Worcestershire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Antrim', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Armagh', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Down', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Fermanagh', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Londonderry', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Northern Ireland', 'county'=>'Tyrone', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Aberdeen City', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Aberdeenshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Angus', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Argyll and Bute', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Borders', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Clackmannan', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Dumfries and Galloway', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'East Ayrshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'East Dumbartonshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'East Lothian', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'East Renfrewshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Edinburgh City', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Falkirk', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Fife', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Glasgow (City of)', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Highland', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Inverclyde', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Midlothian', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Moray', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'North Ayrshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'North Lanarkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Orkney', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Perthshire and Kinross', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Renfrewshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Roxburghshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Shetland', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'South Ayrshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'South Lanarkshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Stirling', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'West Dunbartonshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Scotland', 'county'=>'Western Isles', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Blaenau Gwent', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Bridgend', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Caerphilly', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Cardiff', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Carmarthenshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Ceredigion', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Conwy', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Denbighshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Flintshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Gwynedd', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Isle of Anglesey', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Merthyr Tydfil', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Monmouthshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Neath Port Talbot', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Newport', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Pembrokeshire', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Powys', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Rhondda Cynon Taff', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Swansea', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Torfaen', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'The Vale of Glamorgan', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'Unitary Authorities of Wales', 'county'=>'Wrexham', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'UK Offshore Dependencies', 'county'=>'Channel Islands', 'created_at'=>$now, 'updated_at'=>$now),
				array('country'=>'UK Offshore Dependencies', 'county'=>'Isle of Man', 'created_at'=>$now, 'updated_at'=>$now),
			)
		);
	}

}
