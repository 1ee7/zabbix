<?php
/*
** Zabbix
** Copyright (C) 2001-2019 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/

require_once dirname(__FILE__).'/common/testFormMacros.php';

/**
 * @backup hosts
 */
class testFormHostMacros extends testFormMacros {

	use MacrosTrait;

	/**
	* The id of the host for updating macros.
	*
	* @var string
	*/
	protected $hostid_update = '20006';

	/**
	* The name of the host for updating macros.
	*
	* @var string
	*/
	protected $host_name_update = 'Host for trigger description macros';

	/**
	* The id of the host for removing macros.
	*
	* @var string
	*/
	protected $hostid_remove = '99154';

	/**
	* The name of the host for removing macros.
	*
	* @var string
	*/
	protected $host_name_remove = 'Host for macros delete';

	/**
	 * @dataProvider getCreateCommonMacrosData
	 */
	public function testFormHostMacros_Create($data) {
		$this->checkCreate('host', $data);
	}

	/**
	 * @dataProvider getUpdateCommonMacrosData
	 */
	public function testFormHostMacros_Update($data) {
		$this->checkUpdate('host', $data, $this->hostid_update, $this->host_name_update);
	}

	public function testFormHostMacros_Remove() {
		$this->checkRemove('host', $this->hostid_remove, $this->host_name_remove);
	}
}
