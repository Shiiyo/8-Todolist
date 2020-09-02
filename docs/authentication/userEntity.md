# User Entity
The user is represented by the user entity in <code>/src/Entity/User.php</code></br><br>
It has to implements the interface <code>UserInterface</code> to be able to manage user login, security etc... <br><br>
The UserInterface needs 5 methods:
- <code>getRoles()</code>: return the user's role
- <code>getPassword()</code>: return the hash password
- <code>getSalt()</code>: return the salt used for the password hash
- <code>getUsername()</code>: return the unique username
- <code>eraseCredentials()</code>: erase sensitive data
