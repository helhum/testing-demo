<?php
namespace Helhum\UnitTesting\Tests;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Helmut Hummel <helmut.hummel@typo3.org>
 *  All rights reserved
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the text file GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use Helhum\UnitTesting\Greeter;

/**
 * Class HelloTest
 */
class GreeterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function greetsTheWorld()
    {
        $greeter = new Greeter();
        $this->assertSame('Hello World', $greeter->greet());
    }

}