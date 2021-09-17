# Estudo e Aplicação do Padrão de Projeto Strategy

## Veja neste artigo o que são padrões e qual a sua utilização, além de descrever detalhadamente o padrão de projeto Strategy, além disso o padrão será exemplificado com aplicações reais.

### Introdução

Segundo Christopher Alexander (1977) cada padrão descreve um problema que ocorre repetidamente em nosso ambiente, e então descreve o núcleo da solução para esse problema, de uma forma que você possa usar essa solução um milhão de vezes, sem nunca fazê-lo da mesma forma duas vezes. Padrões de Projeto ajudam os desenvolvedores a resolverem problemas comuns que ocorrem em sistemas orientados a objetos através da reutilização de soluções que funcionaram no passado tornando assim os sistemas mais flexíveis e reutilizáveis. Erich Gamma et.al. (2000) afirma que um padrão possui quatro elementos essenciais, são eles: o nome do padrão que em poucas palavras resume o padrão para tornar mais fácil a comunicação; o problema que descreve quando aplicar o padrão em uma determinada situação; a solução onde se descreve os elementos que compõe o projeto, seus relacionamentos, suas responsabilidades e colaborações; e por fim, as consequências que são os resultados e análises das vantagens e desvantagens da aplicação de um padrão.

Uma referência completa sobre os principais padrões de projeto é encontrada em Erich Gamma et.al. (2000) em seu livro que apresenta um catálogo de 23 padrões de projeto, entre eles o Abstract Factory, Adapter, Bridge, Builder,Command, Composite, Decorator, Façade, Factory Method, Interpreter, State, Strategy, Singleton,Template Method, entre outros. Neste artigo o padrão de projeto Strategy será detalhado. Os autores também propõem uma divisão dos Padrões em três categorias, são elas: padrões com finalidade de criação que são aqueles que se preocupam com o processo de criação de objetos, padrões com finalidade estrutural na qual lidam com a composição de classes ou de objetos ou padrões com finalidade comportamental que caracterizam as maneiras pelas quais classes ou objetos interagem e distribuem responsabilidades. Essa é uma das muitas maneiras que existem de organizar um catálogo de Padrões.

Apesar das bibliografias de Padrões de Projeto trazerem a implementação dos Padrões, vale ressaltar que essa não é a única forma de implementá-los, a forma de implementar um padrão pode e deve ser modificada para atender aos requisitos de um contexto em particular. Portanto, existem muitas maneiras de implementar um Padrão de Projeto e a forma de implementá-lo deve ser aquela que melhor se adéqua às necessidades do contexto.

Padrões de Projeto devem ser usados sabiamente e quando necessários, ou seja, em situações que o padrão de projeto pode realmente permitir uma melhor simplificação da lógica, remoção de duplicação, aumento da flexibilidade ou uma melhor clareza do código. Padrões de Projeto muitas vezes são utilizados em qualquer situação, apenas para tornar o código com um Padrão de Projeto, isso é feito muitas vezes por programadores inexperientes. Nessas situações os Padrões de Projeto podem deixar um código mais complexo ao invés de ser mais simples se fosse utilizado de uma outra, forma sem a utilização de Padrões de Projeto. Joshua Kerievsky (2005) demonstra claramente isso ao mostrar um simples programa "Hello World" utilizando Padrões de Projeto, o código se tornou muito mais complexo de entender.

### Padrão de Projeto Strategy

#### Intenção

Criar uma Strategy para cada variante e fazer com que o método delegue o algoritmo para uma instância de Strategy.

#### Outros nomes dado ao Padrão

**Policy**

**Motivação**

A lógica condicional é uma das estruturas mais complexas e utilizadas no desenvolvimento de softwares corporativos. Lógicas condicionais tendem a crescer e tornar-se cada vez mais sofisticadas, maiores e mais difíceis de manter com o passar do tempo. O padrão Strategy ajuda a gerenciar toda essa complexidade imposta pelas lógicas condicionais. O Padrão Strategy sugere que se produza uma família de classes para cada variação do algoritmo e que se forneça para a classe hospedeira uma instância de Strategy para a qual ela delegará em tempo de execução. Um dos pré-requisitos para o Strategy é uma estrutura de herança onde cada subclasse específica contém uma variação do algoritmo. Assim, o padrão Strategy possui diversos benefícios como clarificar algoritmos ao diminuir ou remover lógica condicional, simplificar uma classe ao mover variações de um algoritmo para uma hierarquia, e habilitar um algoritmo para ser substituído por outro em tempo de execução.

**Aplicabilidade**

Em resumo o padrão Strategy pode ser utilizado quando se tem as seguintes situações:

Quando muitas classes relacionadas diferem apenas no seu comportamento;

- Quando necessita-se de variantes de um algoritmo;
- Quando se precisa ocultar do usuário a exposição das estruturas de dados complexas, específicas do algoritmo;
- Quando uma classe define muitos comportamentos e por sua vez eles aparecem como diversos “IFs”. Com isso esses comandos condicionais são movidos para sua própria classe Strategy.

**Estrutura**

![Exemplo da Estrutura do Padrão Strategy](https://arquivo.devmedia.com.br/artigos/Higor_Medeiros/PadraoStrategy/PadraoStrategy1.jpg)

**Figura 1:** Exemplo da Estrutura do Padrão Strategy

**Participantes**

- **Strategy**: É uma interface comum para todas as subclasses, ou para todos os algoritmos que são suportados. O Contexto usa essa interface para chamar uma das subclasses ConcreteStrategy ou um dos algoritmos definidos.
- **ConcreteStrategy**: A classe concreta que herda da Strategy abstrata está definida como as subclasses ConcreteStrategyA, ConcreteStrategyB e ConcreteStrategyA no diagrama da **figura 1**.
- **Context**: É aquele que vai acessar um dos algoritmos das subclasses de interface Strategy.

**Consequências**

Segue os seguintes benefícios e desvantagens do padrão Strategy:

- Entre os benefícios do padrão Strategy pode-se citar a reutilização por parte do Contexto que permite escolher entre uma família de algoritmos que possuem funcionalidades em comum; os algoritmos em classes Strategy possuem variações do seus algoritmos independentemente do seu contexto, assim é mais fácil utilizá-los, trocá-los, compreende-los e estende-los; diminuição ou eliminação da lógica condicional clarificando ainda mais os algoritmos; a Strategy permite que se escolham diferentes implementações do mesmo comportamento; utilizando Strategy há uma grande simplificação na classe ao mover variações de um algoritmo para uma hierarquia; habilita-se que um algoritmo seja substituído por outro em tempo de execução.
- As desvantagens na utilização do Padrão Strategy é a complicação que há de como os algoritmos obtêm ou recebem dados de suas classes de contexto; o cliente deve conhecer como que os Strategies diferem, antes mesmo que ele possa selecionar um mais apropriado para o contexto da aplicação; o custo da comunicação entre o contexto e o Strategy é significativo, dado que os Strategies concretos não necessariamente usarão todas as informações da Strategy abstrata, portanto podem haver situações em que o contexto criará e inicializará parâmetros que nunca serão usados; Strategies aumentam o número de objetos no sistema, que pode ser ruim em determinadas situações em termos de custo e por fim pessoas inexperiente podem ter dificuldade sobre o funcionamento do código por não entender o que é e como funciona o padrão.

### Implementação

A implementação a ser demonstrada é referente a área de telecomunicações onde uma grande empresa da área de telecomunicações possui uma intranet de atendimento para todo o Brasil e teve num dos seus módulos internos um problema que foi resolvido com o padrão de projeto Strategy. A intranet de atendimento dessa grande empresa de telecomunicações possui todo o gerenciamento interno da empresa, como cadastros e pesquisas dos clientes e funcionários, planos de celulares disponibilizados, ofertas e promoções do dia, mês e ano, aparelhos celulares em vigência pela operadora, áreas de comunicação entre os atendentes e seus supervisores, entre diversos outros. Essa intranet de atendimento é utilizada principalmente pelos funcionários que prestam atendimentos em CallCenters, Ilhas e Segmentos. O CallCenter é um centro de atendimento ao consumidor externo, as Ilhas são atendimentos internos aos operadores de CallCenters que precisam tirar alguma dúvida e os Segmentos são operadores mais internos que cuidam de dúvidas mais específicas como configuração de celulares, ou a área financeira, etc. Cada CallCenter atende a determinados Estados e Municipios do país, cada Ilha atende apenas um certo número de atendentes de CallCenters e cada segmento atende a um determinado número de Ilhas.

O módulo específico que será tratado no exemplo abaixo é o módulo de Atendentes do sistema. Este módulo é responsável por configurar num contexto do sistema as informações do atendente que estava acessando o sistema. Dependendo do atendente que se autentica e o seu nível de atendimento (CallCenter, Ilha, Segmento) o sistema seta algumas configurações importantes que definem o layout que será apresentado e quais os acessos que esse atendente possui no sistema.

Neste módulo havia a seguinte lógica condicional.

**Listagem 1:** Lógica condicional da aplicação.

```
if(obj.equals(“AtendenteCallCenter”)){
	params = new Object[4];
	params[0] = getCallCenter();
	params[1] = getLogin();
	params[2] = getInicioVigencia();
	params[3] = getOrigemCadastro();
}
if(obj.equals(“AtendenteIlha”)){
	params = new Object[5];
	params[0] = getCallCenter();
	params[1] = getLogin();
	params[2] = getInicioVigencia();
	params[3] = getOrigemCadastro();
	params[4] = getIlha();
}
if(obj.equals(“AtendenteSegmento”)){
	params = new Object[6];
	params[0] = getCallCenter();
	params[1] = getLogin();
	params[2] = getInicioVigencia();
	params[3] = getOrigemCadastro();
	params[4] = getIlha();
	params[5] = getSegmento();
}
```

Para cada tipo de atendente o sistema configura os parâmetros necessários para um atendente específico. Para cada nova configuração ou caso surja um novo atendente ou uma nova lógica para um atendente, tudo isso deve ficar dentro dessa condicional, podendo assim, aumentar a lógica condicional e tornando esta cada vez mais complexa e difícil de ser mantida. Esse código contém muitos estados, portanto indica à necessidade de aplicar o padrão Strategy. Uma observação importante é que algumas verificações extensas foram retiradas de partes internas de cada uma das verificações acima para não tornar o código mais complexo e maior.

Utilizando o Padrão de Projeto Strategy tem-se agora como proposta a seguinte hierarquia de classes criadas:

**Listagem 2:** Utilizando Strategy, tem-se a seguinte interface do Strategy

```
public abstract class AtendenteStrategy {

	public String getLogin() {
		...
	}

	public HashMap<Integer, String> getCallCenters(){
		...
	}

	public HashMap<Integer, String> getIlhas(){
		...
	}

	public HashMap<String, String> getSegmentos(){
		...
	}

	public Calendar getInicioVigencia(){
		...
	}

	public String getOrigemCadastro(){
		...
	}

	public abstract Object saveParameter();

}
```

A classe abstrata cima é o contrato que os atendentes irão utilizar no sistema.

**Listagem 3:** Classe concreta do Strategy para atendente de Call Center

```
public class AtendenteCallCenterStrategy extends AtendenteStrategy {

	public Object saveParameter() {
		params = new Object[4];
		params[0] = getCallCenter();
		params[1] = getLogin();
		params[2] = getInicioVigencia();
		params[3] = getOrigemCadastro();
		return params;
	}
}
```

A classe acima é a configuração para o atendente de um Call Center onde configura-se tudo que esse atendente precisa.

**Listagem 4:** Classe concreta do Strategy para atendente de ilhas e segmentos

```
public class AtendenteIlhaStrategy extends AtendenteStrategy {

	public Object [] saveParameter() {
		params = new Object[5];
		params[0] = getCallCenter();
		params[1] = getLogin();
		params[2] = getInicioVigencia();
		params[3] = getOrigemCadastro();
		params[4] = getIlha();
		return params;
	}
}

public class AtendenteSegmentoStrategy extends AtendenteStrategy {

	public Object [] saveParameter() {
		params = new Object[6];
		params[0] = getCallCenter();
		params[1] = getLogin();
		params[2] = getInicioVigencia();
		params[3] = getOrigemCadastro();
		params[4] = getIlha();
		params[5] = getSegmento();
		return params;
	}
}
```

Por fim, o contexto configura qual das classes será chamada para dar à aplicação as configurações necessárias do usuário.

Uma situação que o leitor poderia imaginar é no caso em que o atendente de CallCenter tem uma configuração diferente para o login. Agora o login do operador de CallCenter não deverá mais ser buscado no banco de dados e sim num novo servidor de uma central de outro estado. O que você faria nessa situação utilizando o Strategy acima? Mais uma vez entra aqui a vantagem de utilizar este padrão, bastaria o programador criar um novo método na classe AtendenteCallCenterStrategy sobrescrevendo o método getLogin() da superclasse. Assim, a subclasse getLogin() assumiria o comportamento específico para esse tipo de atendente, sem precisar modificar nada no resto do sistema.

**Listagem 5:** Classe de contexto do Strategy

```
public class Contexto {

	private AtendenteStrategy atendenteStrategy = null;

	public void configuraAtendente() {
		atendenteStrategy.saveParameter();
	}

	public AtendenteStrategy getAtendenteStrategy() {
		return atendenteStrategy;
	}

	public void setAtendenteStrategy(AtendenteStrategy atendenteStrategy) {
		this.atendenteStrategy = atendenteStrategy;
	}

}
```

Uma maneira simples de testar as funcionalidades aqui apresentadas seria fazendo uma classe cliente que configura no Contexto o tipo do atendente (através do setAtendenteStrategy) e depois chamando a operação configuraAtendente().

Após analisar a complexidade da lógica condicional e cada vez mais o aumento do método que mantinha essa condicional verificou-se que algo deveria ser feito para melhorar e aumentar a simplicidade, reuso e organização dessa estrutura. Assim, optou-se pelo padrão Strategy que faz exatamente o proposto, descomplicar uma lógica condicional relativamente grande em pedaços menores.

Portanto, o modelo se encaixou perfeitamente no proposto e ajudou a reduzir bastante essa complexidade. Hoje a o sistema exemplificado está ganhando novos atendentes para novas área e apenas novas classes com suas implementações próprias devem ser criadas para acomodar as novas configurações do sistema.

### Conclusão

Neste artigo procurou-se demonstrar conceitos, aplicabilidade, e implementações de como funciona e como utilizar o padrão de projeto Strategy. Esse importante padrão de projeto deve ser sempre lembrado quando as condições explicadas no artigo surgirem. Esse padrão possui diversas vantagens como foi visto. Espero que o leitor tenha gostado e que tenha sido de boa utilidade esse conhecimento. Dúvidas ou sugestões são bem-vindas e sempre respondo a todas no meu e-mail.

### Bibliografia

- Alexander, Christopher. A Pattern Language. New York: Oxford University Press, 1977.
- JOSHUA KERIEVSKY. Refatoração para padrões. Bookman, ISBN: 9788577802449, 2008.
- Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides. Design Patterns: Elements of Reusable Object-Oriented Software. 1 ed. Estados Unidos: Addison-Wesley, 1995. ISBN 0-201-63361-2.