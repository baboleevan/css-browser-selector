<?php
/*
CSS Browser Selector php v0.0.1 (May 21, 2013)
conversion from js
project: http://code.google.com/p/css-browser-selector/
License: http://creativecommons.org/licenses/by/2.5/
Song Hyo-Jin (shj at xenosi.de)

$className = css_browser_selector::getClassName($_SERVER['HTTP_USER_AGENT]);

*/

class css_browser_selector {
	private static $ua = null, $re = null;
	const g = 'gecko',
		w = 'webkit',
		s = 'safari',
		c = 'chrome',
		o = 'opera',
		m = 'mobile';

	private function __construct() {}

	private static function is($type) {
		return strpos(self::$ua, $type) !== false ? true : false;
	}

	private static function test($regex) {
		return preg_match($regex, self::$ua, self::$re) != false ? true : false;
	}

	public static function getClassName($userAgent) {
		self::$ua = strtolower($userAgent);

		return implode(' ', array(
/* IE */
			(!self::test('~opera|webtv~') && self::test('~msie\s(\d+)~')) ?
				'ie ie'.self::$re[1].((self::$re[1] == 6 || self::$re[1] == 7) ?
					' ie67 ie678 ie6789' : ((self::$re[1] == 8) ?
						' ie678 ie6789' : ((self::$re[1] == 9) ?
							' ie6789 ie9m' : ((self::$re[1] > 9) ?
								' ie9m' : '')))) :
/* FF */
			(self::test('~firefox/(\d+)\.(\d+)~') ? self::g.' ff ff'.self::$re[1].' ff'.self::$re[1].'_'.self::$re[2] :
				(self::is('gecko/') ? self::g :
/* Opera */
			(self::is(self::o) ? self::o.(self::test('~version/(\d+)~') ? ' '.self::o.self::$re[1] :
				(self::test('~opera(\s|/)(\d+)~') ? ' '.self::o.self::$re[2] : '')) :
/* K */
			(self::is('konqueror') ? 'konqueror' :
/* Black Berry */
			(self::is('blackberry') ? self::m.' blackberry' :
/* Android */
			(self::is('android') ? self::m.' android':
/* Chrome */
			((self::is(self::c) || self::is('crios')) ? self::w.' '.self::c :
/* Iron */
			(self::is('iron') ? self::w.' iron' :
/* Safari */
			(self::is('applewebkit/') ? self::w.' '.self::s.(self::test('~version/(\d+)~') ? ' '.self::o.self::$re[1] : '') :
/* Mozilla */
			(self::is('mozilla') ? self::g : '')))))))))),
/* Machine */
			self::is('j2me') ? self::m.' j2me' :
			(self::is('iphone') ? self::m.' ios iphone' :
			(self::is('ipod') ? self::m.' ios ipod' :
			(self::is('ipad') ? self::m.' ios ipad' :
			(self::is('mac') ? 'mac' :
			(self::is('darwin') ? 'mac' :
			(self::is('webtv') ? 'webtv' :
			(self::is('win') ? 'win'.(self::is('windows nt 6.0') ? ' vista' : '') :
			(self::is('freebsd') ? 'freebsd' :
			((self::is('x11') || self::is('linux')) ? 'linux' : '')))))))))
		));
	}
}
