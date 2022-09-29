// Este é um aplicativo gerador de senha simples que gerará uma senha aleatória, talvez você possa usá-los para proteger sua conta.
// Eu tentei o meu melhor para tornar o código o mais simples possível, por favor, não se importe com os nomes das variáveis.
// Também esta idéia veio em minha mente depois de verificar varios casos de falta de gerador de senhas confiaveis.

// Limpe o concole em cada atualização
console.clear();
// definir o corpo para a altura total
// document.body.style.height = `${innerHeight}px`

// Propriedades do controle deslizante de intervalo.
// Preenchimento : a cor final que você vê quando arrasta o controle deslizante.
// background : Plano de fundo do controle deslizante de intervalo padrão
const sliderProps = {
	fill: "#0B1EDF",
	background: "rgba(255, 255, 255, 0.214)",
};

// Selecionando o contêiner Range Slider que afetará a propriedade LENGTH da senha.
const slider = document.querySelector(".range__slider");

// Texto que mostrará o valor do controle deslizante de intervalo.
const sliderValue = document.querySelector(".length__title");

// Usando Event Listener para aplicar o preenchimento e também alterar o valor do texto.
slider.querySelector("input").addEventListener("input", event => {
	sliderValue.setAttribute("data-length", event.target.value);
	applyFill(event.target);
});
// Selecionando a entrada de intervalo e passando-a na função applyFill.
applyFill(slider.querySelector("input"));
// Esta função é responsável por criar a cor final e definir o preenchimento.
function applyFill(slider) {
	const percentage = (100 * (slider.value - slider.min)) / (slider.max - slider.min);
	const bg = `linear-gradient(90deg, ${sliderProps.fill} ${percentage}%, ${sliderProps.background} ${percentage +
			0.1}%)`;
	slider.style.background = bg;
	sliderValue.setAttribute("data-length", slider.value);
}

// Objeto de todos os nomes de funções que usaremos para criar letras aleatórias de senha
const randomFunc = {
	lower: getRandomLower,
	upper: getRandomUpper,
	number: getRandomNumber,
	symbol: getRandomSymbol,
};

// Valor aleatório mais seguro
function secureMathRandom() {
	return window.crypto.getRandomValues(new Uint32Array(1))[0] / (Math.pow(2, 32) - 1);
}

// Funções do gerador
// Todas as funções que são responsáveis ​​por retornar um valor aleatório que usaremos para criar a senha.
function getRandomLower() {
	return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
}
function getRandomUpper() {
	return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
}
function getRandomNumber() {
	return String.fromCharCode(Math.floor(secureMathRandom() * 10) + 48);
}
function getRandomSymbol() {
	const symbols = '~!@#$%^&*()_+{}":?><;.,';
	return symbols[Math.floor(Math.random() * symbols.length)];
}

// Selecionando todos os elementos DOM que são necessários -->

// A Viewbox onde o resultado será mostrado
const resultEl = document.getElementById("result");
// O controle deslizante de entrada, será usado para alterar o comprimento da senha
const lengthEl = document.getElementById("slider");

// Caixas de seleção que representam as opções responsáveis ​​por criar diferentes tipos de senha com base no usuário
const uppercaseEl = document.getElementById("uppercase");
const lowercaseEl = document.getElementById("lowercase");
const numberEl = document.getElementById("number");
const symbolEl = document.getElementById("symbol");

// Botão para gerar a senha
const generateBtn = document.getElementById("generate");
// Botão para copiar o texto
const copyBtn = document.getElementById("copy-btn");
// Contêiner da caixa de visualização de resultados
const resultContainer = document.querySelector(".result");
// Informações de texto mostradas após o botão gerar ser clicado
const copyInfo = document.querySelector(".result__info.right");
// O texto aparece depois que o botão de cópia é clicado
const copiedInfo = document.querySelector(".result__info.left");

// se esta variável for trye somente então o copyBtn aparecerá, ou seja, quando o usuário clicar pela primeira vez em gerar o copyBth irá interagir.
let generatedPassword = false;

// Atualizar CSS Props do botão COPY
// Obtendo os limites do contêiner da caixa de visualização do resultado
let resultContainerBound = {
	left: resultContainer.getBoundingClientRect().left,
	top: resultContainer.getBoundingClientRect().top,
};
// Isto irá atualizar a posição do botão de cópia com base na Posição do mouse
resultContainer.addEventListener("mousemove", e => {
	resultContainerBound = {
		left: resultContainer.getBoundingClientRect().left,
		top: resultContainer.getBoundingClientRect().top,
	};
	if(generatedPassword){
		copyBtn.style.opacity = '1';
		copyBtn.style.pointerEvents = 'all';
		copyBtn.style.setProperty("--x", `${e.x - resultContainerBound.left}px`);
		copyBtn.style.setProperty("--y", `${e.y - resultContainerBound.top}px`);
	}else{
		copyBtn.style.opacity = '0';
		copyBtn.style.pointerEvents = 'none';
	}
});
window.addEventListener("resize", e => {
	resultContainerBound = {
		left: resultContainer.getBoundingClientRect().left,
		top: resultContainer.getBoundingClientRect().top,
	};
});

// Copiar senha na área de transferência
copyBtn.addEventListener("click", () => {
	const textarea = document.createElement("textarea");
	const password = resultEl.innerText;
	if (!password || password == "CLICK GENERATE") {
		return;
	}
	textarea.value = password;
	document.body.appendChild(textarea);
	textarea.select();
	document.execCommand("copy");
	textarea.remove();

	copyInfo.style.transform = "translateY(200%)";
	copyInfo.style.opacity = "0";
	copiedInfo.style.transform = "translateY(0%)";
	copiedInfo.style.opacity = "0.75";
});

// Ao clicar em Gerar ID de senha gerado.
generateBtn.addEventListener("click", () => {
	const length = +lengthEl.value;
	const hasLower = lowercaseEl.checked;
	const hasUpper = uppercaseEl.checked;
	const hasNumber = numberEl.checked;
	const hasSymbol = symbolEl.checked;
	generatedPassword = true;
	resultEl.innerText = generatePassword(length, hasLower, hasUpper, hasNumber, hasSymbol);
	copyInfo.style.transform = "translateY(0%)";
	copyInfo.style.opacity = "0.75";
	copiedInfo.style.transform = "translateY(200%)";
	copiedInfo.style.opacity = "0";
});

// Função responsável por gerar a senha e depois retorná-la.
function generatePassword(length, lower, upper, number, symbol) {
	let generatedPassword = "";
	const typesCount = lower + upper + number + symbol;
	const typesArr = [{ lower }, { upper }, { number }, { symbol }].filter(item => Object.values(item)[0]);
	if (typesCount === 0) {
		return "";
	}
	for (let i = 0; i < length; i++) {
		typesArr.forEach(type => {
			const funcName = Object.keys(type)[0];
			generatedPassword += randomFunc[funcName]();
		});
	}
	return generatedPassword.slice(0, length);
}

// função que lida com o estado das caixas de seleção, portanto, pelo menos uma precisa ser selecionada. A última caixa de seleção será desativada.
function disableOnlyCheckbox(){
	let totalChecked = [uppercaseEl, lowercaseEl, numberEl, symbolEl].filter(el => el.checked)
	totalChecked.forEach(el => {
		if(totalChecked.length == 1){
			el.disabled = true;
		}else{
			el.disabled = false;
		}
	})
}

[uppercaseEl, lowercaseEl, numberEl, symbolEl].forEach(el => {
	el.addEventListener('click', () => {
		disableOnlyCheckbox()
	})
})










let tl = gsap.timeline({
	repeat: -1,
	repeatDelay: 3
  })
  
  tl.fromTo('.js-code-line', {
	scaleX: 0,
	transformOrigin: 'left center'
  }, {
	scaleX: 1,
	transformOrigin: 'left center',
	duration: 0.15,
	stagger: 0.1
  })
  
  tl.from('.js-layout-frame', {
	y: '+=20',
	opacity: 0,
	duration: 0.3,
	ease: 'power1.out'
  })
  
  tl.from('.js-layout-els > *', {
	opacity: 0,
	duration: 0.3,
	stagger: 0.1
  })