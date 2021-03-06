### Helpers

----------

#### checkPassword()

Checks if the provided password matches the user's current password.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		if($user->checkPassword('mypassword'))
		{
			echo 'Password matches.';
		}
		else
		{
			echo 'Password does not match.';
		}
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### getGroups()

Returns the user groups.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Get the user groups
		$groups = $user->getGroups();
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### getPermissions()

Returns the user permissions.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Get the user permissions
		$permissions = $user->getPermissions();
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### getMergedPermissions()

Returns an array of merged permissions from groups and the user permissions.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Get the user permissions
		$permissions = $user->getMergedPermissions();
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### hasAccess($permission)

Checks to see if a user been granted a certain permission. This includes any
permissions given to them by groups they may be apart of as well. Users may
also have permissions with a value of '-1'. This value is used to deny users of
permissions that may have been assigned to them from a group.

Any user with `superuser` permissions automatically has access to everything,
regardless of the user permissions and group permissions.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Check if the user has the 'admin' permission. Also,
		// multiple permissions may be used by passing an array
		if ($user->hasAccess('admin'))
		{
			// User has access to the given permission
		}
		else
		{
			// User does not have access to the given permission
		}
	}
	catch (Cartalyst\Sentry\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### hasAnyAccess($permissions)

This method calls the `hasAccess()` method, and it is used to check if an user
has access to any of the provided permissions.

If one of the provided permissions is found it will return `true` even though the
user may not have access to the other provided permissions.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Check if the user has the 'admin' and 'foo' permission.
		if ($user->hasAnyAccess(array('admin', 'foo')))
		{
			// User has access to one of the given permissions
		}
		else
		{
			// User does not have access to any of the given permissions
		}
	}
	catch (Cartalyst\Sentry\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### isActivated()

Checks if a user is activated.

##### Example

	try
	{
		// Find the user
		$user = Sentry::getUserProvider()->findByLogin('jonh.doe@example.com');

		// Check if the user is activated or not
		if ($user->isActivated())
		{
			// User is Activated
		}
		else
		{
			// User is Not Activated
		}
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### isSuperUser()

Returns if the user is a super user, it means, that has access to everything regardless of permissions.

#### Example

	try
	{
		// Find the user
		$user = Sentry::getUserProvider()->findByLogin('jonh.doe@example.com');

		// Check if this user is a super user
		if ($user->isSuperUser())
		{
			// User is a super user
		}
		else
		{
			// User is not a super user
		}
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

----------

#### inGroup($group)

Checks if a user is in a certain group.

##### Example

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Find the Administrator group
		$admin = Sentry::getGroupProvider()->findByName('Administrator');

		// Check if the user is in the administrator group
		if ($user->inGroup($admin))
		{
			// User is in Administrator group
		}
		else
		{
			// User is not in Administrator group
		}
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}
	catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	{
		echo 'Group was not found.';
	}
