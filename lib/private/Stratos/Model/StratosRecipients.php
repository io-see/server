<?php
declare(strict_types=1);


/**
 * Stratos - above your cloud
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2019, Maxence Lange <maxence@artificial-owl.com>
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OC\Stratos\Model;


use JsonSerializable;
use OCP\Stratos\Model\IStratosRecipients;


/**
 * Class StratosNotification
 *
 * @package OC\Stratos\Model\Helper
 */
class StratosRecipients implements IStratosRecipients, JsonSerializable {


	private $users = [];
	private $groups = [];


	/**
	 * @param string $user
	 *
	 * @return IStratosRecipients
	 */
	public function addUser(string $user): IStratosRecipients {
		$this->users[] = $user;

		return $this;
	}

	/**
	 * @param array $users
	 *
	 * @return IStratosRecipients
	 */
	public function addUsers(array $users): IStratosRecipients {
		$this->users = array_merge($this->users, $users);

		return $this;
	}

	/**
	 * @param string $group
	 *
	 * @return IStratosRecipients
	 */
	public function addGroup(string $group): IStratosRecipients {
		$this->groups[] = $group;

		return $this;
	}

	/**
	 * @param array $groups
	 *
	 * @return IStratosRecipients
	 */
	public function addGroups(array $groups): IStratosRecipients {
		$this->groups = array_merge($this->groups, $groups);

		return $this;
	}


	/**
	 * @return string[]
	 */
	public function getUsers(): array {
		return $this->users;
	}

	/**
	 * @return string[]
	 */
	public function getGroups(): array {
		return $this->groups;
	}


	/**
	 * @return array
	 */
	public function jsonSerialize(): array {
		return [
			'_users'  => $this->getUsers(),
			'_groups' => $this->getGroups()
		];
	}

}

