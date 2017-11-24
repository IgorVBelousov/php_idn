<?php

include 'idna.php';

//mb_internal_encoding('UTF-8');

class Test extends PHPUnit_Framework_TestCase
{

  /**
   * @dataProvider provider_PunycodeIDN
   */
  public function testEncodePunycodeIDN( $input, $output, $description ) {
    $this->assertEquals( $output, EncodePunycodeIDN( $input ), 'Encode: ' . $description );
  }

  /**
   * @dataProvider provider_PunycodeIDN
   */
  public function testDecodePunycodeIDN( $output, $input, $description ) {
    $this->assertEquals( $output, DecodePunycodeIDN( $input ), 'Decode: ' . $description );
  }

  public function provider_PunycodeIDN() {

    return array(

      array(
        'я.рф',
        'xn--41a.xn--p1ai',
        'я.рф'
      ),

      array(
        'симферополь-мп.рф',
        'xn----itbinddlaieei5b8h.xn--p1ai',
        'симферополь-мп.рф'
      ),

      array(
        'ссмферополь-мп',
        'xn----itbscdjahedia4b8h',
        'симферополь-мп'
      ),

      array(
        'яндекс.рф',
        'xn--d1acpjx3f.xn--p1ai',
        'яндекс.рф'
      ),


      array(
        'ليهمابتكلموشعربي؟',
        'xn--egbpdaj6bu4bxfgehfvwxn',
        '(A) Arabic (Egyptian)'
      ),

      array(
        '他们为什么不说中文',
        'xn--ihqwcrb4cv8a8dqg056pqjye',
        '(B) Chinese (simplified)'
      ),

      array(
        '他們爲什麽不說中文',
        'xn--ihqwctvzc91f659drss3x8bo0yb',
        '(C) Chinese (traditional)'
      ),

      array(
        'pročprostěnemluvíčesky',
        'xn--proprostnemluvesky-uyb24dma41a',
        '(D) Czech'
      ),

      array(
        'למההםפשוטלאמדבריםעברית',
        'xn--4dbcagdahymbxekheh6e0a7fei0b',
        '(E) Hebrew'
      ),

      array(
        'यहलोगहिन्दीक्योंनहींबोलसकतेहैं',
        'xn--i1baa7eci9glrd9b2ae1bj0hfcgg6iyaf8o0a1dig0cd',
        '(F) Hindi (Devanagari)'
      ),

      array(
        'なぜみんな日本語を話してくれないのか',
        'xn--n8jok5ay5dzabd5bym9f0cm5685rrjetr6pdxa',
        '(G) Japanese (kanji and hiragana)'
      ),

      array(
        '한국어',
        'xn--3e0bk47br7k',
        '(H) Korean (Hangul syllables)'
      ),

      array(
        'почемужеонинеговорятпорусски',
        'xn--b1abfaaepdrnnbgefbadotcwatmq2g4l',
        '(I) Russian (Cyrillic)'
      ),

      array(
        'porquénopuedensimplementehablarenespañol',
        'xn--porqunopuedensimplementehablarenespaol-fmd56a',
        '(J) Spanish'
      ),

      array(
        'tạisaohọkhôngthểchỉnóitiếngviệt',
        'xn--tisaohkhngthchnitingvit-kjcr8268qyxafd2f1b9g',
        '(K) Vietnamese'
      ),

      array(
        '3年b組金八先生',
        'xn--3b-ww4c5e180e575a65lsy2b',
        '(L) 3<nen>B<gumi><kinpachi><sensei>'
      ),

      array(
        '安室奈美恵-with-super-monkeys',
        'xn---with-super-monkeys-pc58ag80a8qai00g7n9n',
        '(M) <amuro><namie>-with-SUPER-MONKEYS'
      ),

      array(
        'hello-another-way-それぞれの場所',
        'xn--hello-another-way--fc4qua05auwb3674vfr0b',
        '(N) Hello-Another-Way-<sorezore><no><basho>'
      ),

      array(
        'ひとつ屋根の下2',
        'xn--2-u9tlzr9756bt3uc0v',
        '(O) <hitotsu><yane><no><shita>2'
      ),

      array(
        'majiでkoiする5秒前',
        'xn--majikoi5-783gue6qz075azm5e',
        '(P) Maji<de>Koi<suru>5<byou><mae>'
      ),

      array(
        'パフィーdeルンバ',
        'xn--de-jg4avhby1noc0d',
        '(Q) <pafii>de<runba>'
      ),

      array(
        'そのスピードで',
        'xn--d9juau41awczczp',
        '(R) <sono><supiido><de>'
      ),

      array(
        '-> $1.00 <-',
        '-> $1.00 <-',
        '(S)-> $1.00 <-'
      )

    );

  }
}
