<?php
class Auth
{
	const PWD = '<hashed_password>';
	
	static function pwd_is_correct($pwd)
	{
		if (hash('sha256', $pwd) == Auth::PWD)
		{
			return true;
		}
		return false;
	}
}
